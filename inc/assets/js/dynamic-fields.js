( function ( $ ) {
  let maxFields = 1000
  const informations = $( '#Iro-road-map-informations' )
  const buttonAdd = $( '#Iro-add-road-map-informations' )

  let x = 0

  buttonAdd.on( 'click', ( e ) => {
    e.preventDefault()

    if ( x < maxFields ) {
      x++

      const content = `
        <div class="col-12 col-md-6 information">
          <div class="card mt-0 mw-100">
            <div class="card-header bg-white border-0 p-0 d-flex justify-content-end">
              <button class="btn-danger d-flex align-items-center justify-content-center text-white Iro-remove-road-map-informations">x</button>
            </div>
            <div class="card-body p-0 border-0 bg-white">
              <div class="mb-3">
                <label for="Iro-road-map-title-field" class="form-label">Título</label>
                <input type="text" class="form-control" id="Iro-road-map-title-field" name="CDR_road_map_title[]" placeholder="Insira o título">
              </div>

              <div class="mb-3">
                <label for="Iro-month-field" class="form-label">Dias da semana</label>
                <select name="CDR_road_map_days_week[]" id="Iro-field" class="form-select">
                <option value="">Selecionar</option>
                <option value="segunda-feira" ' . selected( $road_map_days_week, 'segunda-feira' ) . '>Segunda-feira</option>
                <option value="terca-feira" ' . selected( $road_map_days_week, 'terca-feira' ) . '>Terça-feira</option>
                <option value="quarta-feira" ' . selected( $road_map_days_week, 'quarta-feira' ) . '>Quarta-feira</option>
                <option value="quinta-feira" ' . selected( $road_map_days_week, 'quinta-feira' ) . '>Quinta-feira</option>
                <option value="sexta-feira" ' . selected( $road_map_days_week, 'sexta-feira' ) . '>Sexta-feira</option>
                <option value="sabado" ' . selected( $road_map_days_week, 'sabado' ) . '>Sábado</option>
                <option value="domingo" ' . selected( $road_map_days_week, 'domingo' ) . '>Domingo</option>
                </select>
              </div>

              <div class="mb-3">
                <div class="row">
                  <div class="col-12 mb-3">
                    <button class="button" id="Iro-add-road-map-hour-description-${x}">+ Adicionar horário e descrição</button>
                  </div>
                </div>
                <div class="row Iro-road-map-hour-description">
                  <div class="col-12 mb-3 hour-description">
                    <div class="row">
                      <div class="col-12 col-md-2">
                        <label for="Iro-road-map-time-field" class="form-label">Horário</label>
                        <input type="time" class="form-control" id="Iro-road-map-time-field" name="CDR_road_map_time[]" placeholder="Insira o horário">
                      </div>

                      <div class="col-12 col-md-9">
                        <label for="Iro-road-map-description-field" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="Iro-road-map-description-field" name="CDR_road_map_description[]" placeholder="Insira a descrição">
                      </div>

                      <div class="col-12 col-md-1 d-flex align-items-end">
                        <button class="btn-danger d-flex align-items-center justify-content-center text-white Iro-remove-road-map-hour-description">x</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`

      informations.append( content )

      // hourDescription.on( 'click', '.Iro-add-road-map-hour-description', function ( e ) {
      //   e.preventDefault()

      //   x++

      //   const contentHourDescription = `
      //   <div class="col-12 mb-3 hour-description">
      //   <div class="row">
      //   <div class="col-12 col-md-2">
      //   <label for="Iro-road-map-time-field" class="form-label">Horário</label>
      //   <input type="time" class="form-control" id="Iro-road-map-time-field" name="CDR_road_map_time[]" placeholder="Insira o horário">
      //   </div>

      //   <div class="col-12 col-md-9">
      //   <label for="Iro-road-map-description-field" class="form-label">Descrição</label>
      //   <input type="text" class="form-control" id="Iro-road-map-description-field" name="CDR_road_map_description[]" placeholder="Insira a descrição">
      //   </div>

      //   <div class="col-12 col-md-1 d-flex align-items-end">
      //   <button class="btn-danger d-flex align-items-center justify-content-center text-white Iro-remove-road-map-hour-description">x</button>
      //   </div>
      //   </div>
      //   </div>
      //   </div>`

      //   $( this ).parents( '.hour-description' ).append( contentHourDescription )
      //   // $( this ).parents( '.hour-description' ).remove()
      //   // x++
      // } )
    }

    // if ( x < maxFields ) {
    //   x++

    //   // hourDescription.on( 'click', '.Iro-add-road-map-hour-description', function () {
    //   //   alert()
    //   //   const contentHourDescription = `
    //   //     <div class="col-12 mb-3 hour-description">
    //   //       <div class="row">
    //   //         <div class="col-12 col-md-2">
    //   //           <label for="Iro-road-map-time-field" class="form-label">Horário</label>
    //   //           <input type="time" class="form-control" id="Iro-road-map-time-field" name="CDR_road_map_time[]" placeholder="Insira o horário">
    //   //         </div>

    //   //         <div class="col-12 col-md-9">
    //   //           <label for="Iro-road-map-description-field" class="form-label">Descrição</label>
    //   //           <input type="text" class="form-control" id="Iro-road-map-description-field" name="CDR_road_map_description[]" placeholder="Insira a descrição">
    //   //         </div>

    //   //         <div class="col-12 col-md-1 d-flex align-items-end">
    //   //           <button class="btn-danger d-flex align-items-center justify-content-center text-white Iro-remove-road-map-hour-description">x</button>
    //   //         </div>
    //   //       </div>
    //   //     </div>
    //   //   </div>`

    //   //   hourDescription.append( contentHourDescription )
    //   // } )
    // }
  } )

  if ( x < maxFields ) {
    x++
    const hourDescription = $( '.Iro-road-map-hour-description' )
    const buttonHourDescriptionAdd = $( '.hours-descriptions .button' )

    buttonHourDescriptionAdd.each( function ( i ) {
      console.log( i )
    } )
  }

  informations.on( 'click', '.Iro-remove-road-map-informations', function ( e ) {
    e.preventDefault()

    $( this ).parents( '.information' ).remove()
    x--
  } )
} )( jQuery )
