<?php
    /**
     * Partials Content Contact Template.
     *
     * @package sjp
     */

    $mods = get_theme_mods();

    $whatsApp = isset( $mods['sjp_field_whatsapp'] ) ? $mods['sjp_field_whatsapp'] : '';
    $phone = isset( $mods['sjp_field_phone'] ) ? $mods['sjp_field_phone'] : '';
    $email = isset( $mods['sjp_field_email'] ) ? $mods['sjp_field_email'] : '';
    $address = isset( $mods['sjp_field_address'] ) ? $mods['sjp_field_address'] : '';
    $iframe = isset( $mods['sjp_field_map_iframe'] ) ? $mods['sjp_field_map_iframe'] : '';

    $whatsapp_slug = '55' . str_replace( '-', '', sanitize_title( $whatsApp ) );
    $phone_slug = '55' . str_replace( '-', '', sanitize_title( $phone ) );
?>


<div class="row align-items-center">
  <div class="col-12 mb-4">
    <div class="iframe">
      <?php echo $iframe; ?>
    </div>
  </div>
  <div class="col-12 col-md-5">

    <h1 class="fw-bold mb-3">Informações</h1>

    <ul class="contact-info list-unstyled">
      <li>
        <i class="fab fa-whatsapp"></i>
        <a target="_blank"
          href="https://api.whatsapp.com/send/?phone=<?php echo $whatsapp_slug; ?>&text=Quero+falar+com+a+Serralheria.&app_absent=0">
          <?php echo $whatsApp; ?>
        </a>
      </li>
      <li>
        <i class="fas fa-phone"></i>
        <a href="tel:<?php echo $phone_slug; ?>">
          <?php echo $phone; ?>
        </a>
      </li>
      <li>
        <i class="fas fa-envelope"></i>
        <a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
      </li>
      <li>
        <i class="fas fa-map-marker-alt"></i>
        <?php echo $address; ?>
      </li>
    </ul>


  </div>
  <div class="col-12 col-md-7">
    <form id="contactForm" class="p-4 overflow-hidden" method="get">
      <h4 class="mb-3 fw-bold">Se preferir, envie-nos uma mensagem.</h4>
      <div class="mb-3">
        <label for="name" class="form-label">Nome completo</label>
        <input type="text" name="name" class="form-control" id="name" />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <label for="pw" class="form-label">WhatsApp</label>
        <input type="tel" name="pw" class="form-control" id="pw">
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">O que deseja?</label>
        <textarea class="form-control" name="message" id="message" rows="5"></textarea>
      </div>

      <button type="submit" class="btn bg-dark-red text-white">Enviar</button>

      <div class="area-message">
        <div class="alert alert-success mt-3 mb-0" role="alert"></div>
      </div>

    </form>
  </div>

</div>