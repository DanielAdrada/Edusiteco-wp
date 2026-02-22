<!-- ===================== -->
<!-- Sección: Información de Contacto -->
<!-- ===================== -->
<h2>Sección de Contacto</h2>
<p>Agrega la información de contacto que aparecerá en la página principal del sitio institucional.</p>

<?php
$o = get_option('info_colegio_settings');
?>

<div style="margin-top:20px; border:1px solid #ddd; border-radius:8px; padding:20px;">
       <h3 style="margin-bottom:15px;">Información de contacto</h3>

       <label><strong>Dirección:</strong></label><br>
       <input type="text" name="info_colegio_settings[contacto][direccion]"
              value="<?php echo esc_attr($o['contacto']['direccion'] ?? ''); ?>"
              class="regular-text"
              placeholder="Ej: Carrera 15 #45-67, Barrio Centro"><br><br>

       <label><strong>Ciudad:</strong></label><br>
       <input type="text" name="info_colegio_settings[contacto][ciudad]"
              value="<?php echo esc_attr($o['contacto']['ciudad'] ?? ''); ?>"
              class="regular-text"
              placeholder="Ej: Bogotá D.C., Colombia"><br><br>

       <label><strong>Teléfono:</strong></label><br>
       <input type="text" name="info_colegio_settings[contacto][telefono]"
              value="<?php echo esc_attr($o['contacto']['telefono'] ?? ''); ?>"
              class="regular-text"
              placeholder="Ej: (601) 234-5678"><br><br>

       <label><strong>Correo Electrónico:</strong></label><br>
       <input type="email" name="info_colegio_settings[contacto][correo]"
              value="<?php echo esc_attr($o['contacto']['correo'] ?? ''); ?>"
              class="regular-text"
              placeholder="Ej: contacto@iesanmartin.edu.co"><br><br>

       <label><strong>Horario de atención:</strong></label><br>
       <input type="text" name="info_colegio_settings[contacto][horario]"
              value="<?php echo esc_attr($o['contacto']['horario'] ?? ''); ?>"
              class="regular-text"
              placeholder="Ej: Lunes a Viernes: 7:00 AM - 4:00 PM"><br><br>

       <label><strong>Ubicación en Google Maps (URL compartida):</strong></label><br>
       <textarea name="info_colegio_settings[contacto][mapa]"
              rows="2"
              class="large-text code"
              placeholder="Ej: https://maps.app.goo.gl/abcd1234">
    <?php echo esc_textarea($o['contacto']['mapa'] ?? ''); ?>
</textarea>

</div>