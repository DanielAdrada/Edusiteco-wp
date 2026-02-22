<!-- ===================== -->
<!-- Historia del Colegio -->
<!-- ===================== -->
<h2>Historia del Colegio</h2>
<p>Describe brevemente la historia y evolución del colegio.</p>

<?php
$o = get_option('info_colegio_settings');
$historia = isset($o['historia']) ? $o['historia'] : '';
?>
<textarea name="info_colegio_settings[historia]"
    rows="6"
    class="large-text"
    placeholder="Ej: Nuestro colegio fue fundado en 1985 con el propósito de brindar educación de calidad a la comunidad..."><?php echo esc_textarea($historia); ?></textarea>

<hr style="margin: 40px 0;">

<!-- ===================== -->
<!-- Hitos Históricos -->
<!-- ===================== -->

<h2>Hitos Históricos</h2>
<p>Agrega los hitos más importantes en la historia del colegio: año, título y descripción.</p>

<div id="hitos-container">
    <?php
    $hitos = isset($o['hitos']) && is_array($o['hitos'])
        ? $o['hitos']
        : [['año' => '', 'titulo' => '', 'descripcion' => '']];

    foreach ($hitos as $index => $h) :
    ?>
        <div class="hito-item" style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
            <label><strong>Año del hito:</strong></label><br>
            <input type="text" name="info_colegio_settings[hitos][<?php echo $index; ?>][año]"
                value="<?php echo esc_attr($h['año'] ?? ''); ?>"
                class="regular-text"
                placeholder="Ej: 1998">
            <div class="espacio"></div>

            <label><strong>Título del hito:</strong></label><br>
            <input type="text" name="info_colegio_settings[hitos][<?php echo $index; ?>][titulo]"
                value="<?php echo esc_attr($h['titulo'] ?? ''); ?>"
                class="regular-text"
                placeholder="Ej: Fundación del Colegio"><br><br>

            <label><strong>Descripción del hito:</strong></label><br>
            <textarea name="info_colegio_settings[hitos][<?php echo $index; ?>][descripcion]"
                rows="3"
                class="large-text"
                placeholder="Describe brevemente este hito"><?php echo esc_textarea($h['descripcion'] ?? ''); ?></textarea><br><br>

            <button type="button" class="button remove-hito">Eliminar</button>
        </div>
    <?php endforeach; ?>
</div>

<button type="button" class="button button-secondary" id="add-hito">+ Agregar Hito</button>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const hitosContainer = document.getElementById("hitos-container");
        const addHitoBtn = document.getElementById("add-hito");

        addHitoBtn.addEventListener("click", () => {
            const index = hitosContainer.querySelectorAll(".hito-item").length;
            const div = document.createElement("div");
            div.className = "hito-item";
            div.style.marginBottom = "20px";
            div.style.border = "1px solid #ddd";
            div.style.padding = "15px";
            div.style.borderRadius = "6px";
            div.innerHTML = `
            <label><strong>Año:</strong></label><br>
            <input type="text" name="info_colegio_settings[hitos][${index}][año]" class="regular-text" placeholder="Ej: 2001"><br><br>

            <label><strong>Título del hito:</strong></label><br>
            <input type="text" name="info_colegio_settings[hitos][${index}][titulo]" class="regular-text" placeholder="Ej: Ampliación de sedes"><br><br>

            <label><strong>Descripción:</strong></label><br>
            <textarea name="info_colegio_settings[hitos][${index}][descripcion]" rows="3" class="large-text" placeholder="Describe brevemente este hito"></textarea><br><br>

            <button type="button" class="button remove-hito">Eliminar</button>
        `;
            hitosContainer.appendChild(div);
        });

        hitosContainer.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-hito")) {
                e.target.closest(".hito-item").remove();
            }
        });
    });
</script>

<hr style="margin: 40px 0;">

<!-- ===================== -->
<!-- Logros Destacados -->
<!-- ===================== -->
<h2>Logros Destacados</h2>
<p>Agrega los logros más importantes o reconocimientos del colegio.</p>

<div id="logros-container">
    <?php
    $logros = isset($o['logros']) && is_array($o['logros'])
        ? $o['logros']
        : [['titulo' => '', 'descripcion' => '']];

    foreach ($logros as $index => $l) :
    ?>
        <div class="logro-item" style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
            <label><strong>Título del logro:</strong></label><br>
            <input type="text" name="info_colegio_settings[logros][<?php echo $index; ?>][titulo]"
                value="<?php echo esc_attr($l['titulo'] ?? ''); ?>"
                class="regular-text"
                placeholder="Ej: Premio a la Excelencia Educativa"><br><br>

            <label><strong>Descripción:</strong></label><br>
            <textarea name="info_colegio_settings[logros][<?php echo $index; ?>][descripcion]" rows="3"
                class="large-text"
                placeholder="Describe brevemente este logro"><?php echo esc_textarea($l['descripcion'] ?? ''); ?></textarea><br><br>

            <button type="button" class="button remove-logro">Eliminar</button>
        </div>
    <?php endforeach; ?>
</div>

<button type="button" class="button button-secondary" id="add-logro">+ Agregar Logro</button>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const logrosContainer = document.getElementById("logros-container");
        const addLogroBtn = document.getElementById("add-logro");

        addLogroBtn.addEventListener("click", () => {
            const index = logrosContainer.querySelectorAll(".logro-item").length;
            const div = document.createElement("div");
            div.className = "logro-item";
            div.style.marginBottom = "20px";
            div.style.border = "1px solid #ddd";
            div.style.padding = "15px";
            div.style.borderRadius = "6px";
            div.innerHTML = `
            <label><strong>Título del logro:</strong></label><br>
            <input type="text" name="info_colegio_settings[logros][${index}][titulo]" class="regular-text" placeholder="Ej: Premio Nacional de Innovación"><br><br>

            <label><strong>Descripción:</strong></label><br>
            <textarea name="info_colegio_settings[logros][${index}][descripcion]" rows="3" class="large-text" placeholder="Describe brevemente este logro"></textarea><br><br>

            <button type="button" class="button remove-logro">Eliminar</button>
        `;
            logrosContainer.appendChild(div);
        });

        logrosContainer.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-logro")) {
                e.target.closest(".logro-item").remove();
            }
        });
    });
</script>