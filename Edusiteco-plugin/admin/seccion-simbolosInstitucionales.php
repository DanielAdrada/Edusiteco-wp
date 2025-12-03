<!-- ===================== -->
<!-- Escudo Institucional -->
<!-- ===================== -->
<h2>Escudo Institucional</h2>
<p>Agrega la imagen, el título y la descripción del escudo institucional del colegio.</p>

<?php
$o = get_option('info_colegio_settings');
$escudo = isset($o['escudo']) ? $o['escudo'] : ['imagen' => '', 'titulo' => '', 'descripcion' => ''];
?>

<div style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
    <label><strong>Imagen del escudo:</strong></label><br>
    <input type="text" name="info_colegio_settings[escudo][imagen]"
        id="escudo_imagen"
        value="<?php echo esc_attr($escudo['imagen']); ?>"
        class="regular-text"
        placeholder="URL de la imagen del escudo">
    <button type="button" class="button" id="upload_escudo_button">Subir Imagen</button>
    <br><br>

    <label><strong>Título del escudo:</strong></label><br>
    <input type="text" name="info_colegio_settings[escudo][titulo]"
        value="<?php echo esc_attr($escudo['titulo']); ?>"
        class="regular-text"
        placeholder="Ej: Escudo Institucional"><br><br>

    <label><strong>Descripción del escudo:</strong></label><br>
    <textarea name="info_colegio_settings[escudo][descripcion]"
        rows="4"
        class="large-text"
        placeholder="Describe el significado del escudo..."><?php echo esc_textarea($escudo['descripcion']); ?></textarea>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const button = document.getElementById("upload_escudo_button");
        const input = document.getElementById("escudo_imagen");

        // Usa la librería de medios de WordPress
        button.addEventListener("click", (e) => {
            e.preventDefault();
            const frame = wp.media({
                title: "Seleccionar imagen del escudo",
                button: {
                    text: "Usar esta imagen"
                },
                multiple: false
            });

            frame.on("select", () => {
                const attachment = frame.state().get("selection").first().toJSON();
                input.value = attachment.url;
            });

            frame.open();
        });
    });
</script>

<!-- ===================== -->
<!-- Bandera Institucional -->
<!-- ===================== -->
<h2>Bandera Institucional</h2>
<p>Agrega la imagen, el título y la descripción de la bandera institucional del colegio.</p>

<?php
$o = get_option('info_colegio_settings');
$bandera = isset($o['bandera']) ? $o['bandera'] : ['imagen' => '', 'titulo' => '', 'descripcion' => ''];
?>

<div style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
    <label><strong>Imagen de la bandera:</strong></label><br>
    <input type="text" name="info_colegio_settings[bandera][imagen]"
        id="bandera_imagen"
        value="<?php echo esc_attr($bandera['imagen']); ?>"
        class="regular-text"
        placeholder="URL de la imagen de la bandera">
    <button type="button" class="button" id="upload_bandera_button">Subir Imagen</button>
    <br><br>

    <label><strong>Título de la bandera:</strong></label><br>
    <input type="text" name="info_colegio_settings[bandera][titulo]"
        value="<?php echo esc_attr($bandera['titulo']); ?>"
        class="regular-text"
        placeholder="Ej: Bandera Institucional"><br><br>

    <label><strong>Descripción de la bandera:</strong></label><br>
    <textarea name="info_colegio_settings[bandera][descripcion]"
        rows="4"
        class="large-text"
        placeholder="Describe el significado de la bandera..."><?php echo esc_textarea($bandera['descripcion']); ?></textarea>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const button = document.getElementById("upload_bandera_button");
        const input = document.getElementById("bandera_imagen");

        // Usa la librería de medios de WordPress
        button.addEventListener("click", (e) => {
            e.preventDefault();
            const frame = wp.media({
                title: "Seleccionar imagen de la bandera",
                button: {
                    text: "Usar esta imagen"
                },
                multiple: false
            });

            frame.on("select", () => {
                const attachment = frame.state().get("selection").first().toJSON();
                input.value = attachment.url;
            });

            frame.open();
        });
    });
</script>

<!-- ===================== -->
<!-- Himno Institucional -->
<!-- ===================== -->
<h2>Himno Institucional</h2>
<p>Agrega la letra completa del himno institucional del colegio.</p>

<div style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
    <label><strong>Letra del Himno:</strong></label><br>
    <textarea
        name="info_colegio_settings[himno][letra]"
        rows="10"
        class="large-text code"
        placeholder="Escribe aquí la letra completa del himno institucional..."><?php
                                                                                echo esc_textarea($o['himno']['letra'] ?? '');
                                                                                ?></textarea>
</div>

<!-- ===================== -->
<!-- Lema Institucional -->
<!-- ===================== -->
<h2>Lema Institucional</h2>
<p>Agrega el lema institucional del colegio, incluyendo sutexto principal y una breve explicación.</p>
<label><strong>Título del lema:</strong></label><br>
<input
    type="text"
    name="info_colegio_settings[lema][titulo]"
    value="<?php echo esc_attr($o['lema']['titulo'] ?? ''); ?>"
    class="regular-text"
    placeholder="Ej: Nuestro Lema"><br><br>


<label><strong>Texto del lema:</strong></label><br>
<input
    type="text"
    name="info_colegio_settings[lema][texto]"
    value="<?php echo esc_attr($o['lema']['texto'] ?? ''); ?>"
    class="regular-text"
    placeholder="Ej: Saber, Honor y Disciplina"><br><br>

<label><strong>Explicación del lema:</strong></label><br>
<textarea
    name="info_colegio_settings[lema][explicacion]"
    rows="4"
    class="large-text code"
    placeholder="Describe brevemente el significado del lema..."><?php
                                                                    echo esc_textarea($o['lema']['explicacion'] ?? '');
                                                                    ?></textarea>
</div>