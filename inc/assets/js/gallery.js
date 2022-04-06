( function ( $ ) {
  function sortableImageGalleryMedia ( $imageContainer, $imageInput ) {
    'use strict'

    let fileframe

    if ( undefined !== fileframe ) {
      fileframe.open()
      return
    }

    fileframe = wp.media( {
      multiple: true
    } )

    fileframe.on( 'open', function () {
      const selection = fileframe.state().get( 'selection' )
      const ids = $imageInput.val().split( ',' )

      ids.forEach( function ( id ) {
        const attachment = wp.media.attachment( id )
        attachment.fetch()
        selection.add( attachment ? [attachment] : [] )
      } )
    } )

    fileframe.on( 'select', function () {
      const attachments = fileframe.state().get( 'selection' ).toJSON()
      const attachmentIDs = []

      $imageContainer.empty()

      const $galleryID = $imageContainer.attr( 'id' )

      for ( let i = 0; i < attachments.length; i++ ) {
        if ( attachments[i].type === 'image' ) {
          attachmentIDs.push( attachments[i].id )
          $imageContainer.append( sortableGalleryImageCreate( attachments[i], $galleryID ) )
        }
      }

      $imageInput.val( attachmentIDs.join() )
      sortableGalleryImageRemove()
    } )

    fileframe.open()
  }

  function sortableGalleryImageCreate ( $attachment, $galleryID ) {
    let $output = '<li tabindex="0" role="checkbox" aria-label="' + $attachment.title + '" aria-checked="true" data-id="' + $attachment.id + '" class="attachment save-ready selected details">'
    $output += '<div class="attachment-preview js--select-attachment type-image subtype-jIro portrait">'
    $output += '<div class="thumbnail">'

    $output += '<div class="centered">'
    $output += '<img src="' + $attachment.sizes.thumbnail.url + '" draggable="false" alt="">'
    $output += '</div>'

    $output += '</div>'

    $output += '</div>'

    $output += '<button type="button" data-gallery="#' + $galleryID + '" class="button-link check asap-image-remove" tabindex="0"><span class="media-modal-icon"></span><span class="screen-reader-text">Deselect</span></button>'

    $output += '</li>'
    return $output
  }

  function sortableGalleryImageRemove () {
    jQuery( '.remove-sortable-wordpress-gallery-image' ).on( 'click', function () {
      $id = jQuery( this ).parent().attr( 'data-id' )
      $gallery = jQuery( this ).attr( 'data-gallery' )
      $imageInput = jQuery( $gallery + '_input' )
      jQuery( this ).parent().remove()
      const ids = $imageInput.val().split( ',' )
      $idIndex = ids.indexOf( $id )
      if ( $idIndex >= 0 ) {
        ids.splice( $idIndex, 1 )
        $imageInput.val( ids.join() )
      }
    } )
  }

  const imageButton = $( '.add-sortable-wordpress-gallery' )

  sortableGalleryImageRemove()

  imageButton.each( function () {
    const galleryID = $( this ).attr( 'data-gallery' )
    const imageContainer = $( galleryID )
    const imageInput = $( galleryID + '_input' )
    imageContainer.sortable()
    imageContainer.on( 'sortupdate', function ( event, ui ) {
      $ids = []
      $images = imageContainer.children( 'li' )
      $images.each( function () {
        $ids.push( $( this ).attr( 'data-id' ) )
      } )
      imageInput.val( $ids.join() )
    } )

    $( this ).on( 'click', function () {
      sortableImageGalleryMedia( imageContainer, imageInput )
    } )
  } )
} )( jQuery )
