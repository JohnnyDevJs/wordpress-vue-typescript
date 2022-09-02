<?php
/**
 * Shortcode
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

class Shortcodes {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */

        add_shortcode( 'form', [$this, 'authentication_form'] );

    }

    public function authentication_form( $atts, $content = null ) {
        $atts = shortcode_atts( [
            'display' => ['cadastro', 'login']
        ], $atts );

        $display = $atts['display'];

        if ( $display == 'cadastro' ) {

            $content = '

                <div class="card shadow border-0">
                  <div class="card-header">
                    <h1>Cadastre-se na Área Médica</h1>
                  </div>
                  <div class="card-body">
                    <form id="register_form" method="post" class="row g-3 needs-validation" novalidate>
                      <label class="error"></label>
                      <div class="col-12">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nome" required>
                      </div>

                      <div class="col-12">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Sobrenome" required>
                      </div>

                      <div class="col-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                      </div>

                      <div class="col-12">
                        <select class="form-select" id="specialty" name="specialty" required>
                          <option selected value="">Especialidade</option>
                          <option value="medicos">Médicos</option>
                          <option value="enfermagem">Enfermagem</option>
                          <option value="farmacia">Farmácia</option>
                          <option value="nutricao">Nutrição</option>
                        </select>
                      </div>

                      <div class="col-12">
                        <select class="form-select" id="professional" name="professional" required>
                          <option selected value="">Área profissional</option>
                          <option value="Funcionário SES">Funcionário SES</option>
                          <option value="Não Funcionário">Não Funcionário</option>
                        </select>
                      </div>

                      <div class="col-12">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha" minlength="5" required>
                      </div>

                      <div class="col-12">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" minlength="5" placeholder="Senha" required>
                      </div>

                      <div class="col-12 d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                      </div>

                    </form>
                  </div>
                </div>

            ';

            return $content;
        } else {
            return 'login';
        }

    }

}
