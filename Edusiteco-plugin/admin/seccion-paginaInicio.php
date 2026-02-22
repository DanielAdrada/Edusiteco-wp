<!-- ===================== -->
<!-- SECCIÓN: SEDES DEL COLEGIO -->
<!-- ===================== -->
<h2>Sedes del Colegio</h2>
<p>Agrega las sedes de la institución (principal y adicionales). Puedes subir una imagen para cada sede .</p>

<table class="form-table">
    <tr>
        <td>
            <div id="sedes-container">
                <?php
                $sedes = isset($o['sedes']) && is_array($o['sedes']) ? $o['sedes'] : [
                    ['nombre' => '', 'direccion' => '', 'telefono' => '', 'horario' => '', 'imagen' => '']
                ];

                foreach ($sedes as $index => $sede) :
                ?>
                    <div class="sede-item" style="margin-bottom:20px; border:1px solid #ccc; padding:15px; border-radius:8px;">
                        <label><strong>Nombre de la Sede:</strong></label><br>
                        <input type="text" name="info_colegio_settings[sedes][<?php echo $index; ?>][nombre]"
                            value="<?php echo esc_attr($sede['nombre'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: Sede Principal"><br><br>

                        <label><strong>Dirección:</strong></label><br>
                        <input type="text" name="info_colegio_settings[sedes][<?php echo $index; ?>][direccion]"
                            value="<?php echo esc_attr($sede['direccion'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: Carrera 15 #445-67, Barrio Centro"><br><br>

                        <label><strong>Teléfono:</strong></label><br>
                        <input type="text" name="info_colegio_settings[sedes][<?php echo $index; ?>][telefono]"
                            value="<?php echo esc_attr($sede['telefono'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: (601) 234-5678"><br><br>

                        <label><strong>Horario:</strong></label><br>
                        <input type="text" name="info_colegio_settings[sedes][<?php echo $index; ?>][horario]"
                            value="<?php echo esc_attr($sede['horario'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: 7:00 AM - 4:00 PM"><br><br>

                        <label><strong>Imagen de la Sede:</strong></label><br>
                        <div style="margin-top:10px;">
                            <img src="<?php echo esc_url($sede['imagen'] ?? ''); ?>"
                                class="sede-preview"
                                style="max-width:200px; display:<?php echo !empty($sede['imagen']) ? 'block' : 'none'; ?>; margin-bottom:10px; border-radius:6px;">
                            <input type="hidden" name="info_colegio_settings[sedes][<?php echo $index; ?>][imagen]"
                                value="<?php echo esc_attr($sede['imagen'] ?? ''); ?>"
                                class="sede-imagen-url">
                            <button type="button" class="button upload-sede-imagen">Seleccionar Imagen</button>
                            <button type="button" class="button remove-sede-imagen" style="display:<?php echo !empty($sede['imagen']) ? 'inline-block' : 'none'; ?>;">Quitar Imagen</button>
                        </div><br>

                        <button type="button" class="button remove-sede">Eliminar Sede</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="button button-secondary" id="add-sede">+ Agregar Sede</button>
        </td>
    </tr>
</table>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cont = document.getElementById("sedes-container");
        const addBtn = document.getElementById("add-sede");

        // Agregar nueva sede
        addBtn.addEventListener("click", () => {
            const index = cont.querySelectorAll(".sede-item").length;
            const div = document.createElement("div");
            div.className = "sede-item";
            div.style.marginBottom = "20px";
            div.style.border = "1px solid #ccc";
            div.style.padding = "15px";
            div.style.borderRadius = "8px";
            div.innerHTML = `
            <label><strong>Nombre de la Sede:</strong></label><br>
            <input type="text" name="info_colegio_settings[sedes][${index}][nombre]" class="regular-text" placeholder="Ej: Sede Norte"><br><br>

            <label><strong>Dirección:</strong></label><br>
            <input type="text" name="info_colegio_settings[sedes][${index}][direccion]" class="regular-text" placeholder="Ej: Calle 100 #45-20, Usaquén"><br><br>

            <label><strong>Teléfono:</strong></label><br>
            <input type="text" name="info_colegio_settings[sedes][${index}][telefono]" class="regular-text" placeholder="Ej: (601) 234-5679"><br><br>

            <label><strong>Horario:</strong></label><br>
            <input type="text" name="info_colegio_settings[sedes][${index}][horario]" class="regular-text" placeholder="Ej: 7:00 AM - 4:00 PM"><br><br>

            <label><strong>Imagen de la Sede:</strong></label><br>
            <div style="margin-top:10px;">
                <img src="" class="sede-preview" style="max-width:200px; display:none; margin-bottom:10px; border-radius:6px;">
                <input type="hidden" name="info_colegio_settings[sedes][${index}][imagen]" class="sede-imagen-url">
                <button type="button" class="button upload-sede-imagen">Seleccionar Imagen</button>
                <button type="button" class="button remove-sede-imagen" style="display:none;">Quitar Imagen</button>
            </div><br>

            <button type="button" class="button remove-sede">Eliminar Sede</button>
        `;
            cont.appendChild(div);
        });

        // Eliminar sede
        cont.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-sede")) {
                e.target.closest(".sede-item").remove();
            }
        });

        // ========================
        // Subida de imágenes WP
        // ========================
        function initUploader(button) {
            const frame = wp.media({
                title: "Seleccionar imagen de la sede",
                button: {
                    text: "Usar esta imagen"
                },
                multiple: false
            });

            frame.on("select", () => {
                const attachment = frame.state().get("selection").first().toJSON();
                const item = button.closest(".sede-item");
                const input = item.querySelector(".sede-imagen-url");
                const preview = item.querySelector(".sede-preview");
                const removeBtn = item.querySelector(".remove-sede-imagen");

                input.value = attachment.url;
                preview.src = attachment.url;
                preview.style.display = "block";
                removeBtn.style.display = "inline-block";
            });

            frame.open();
        }

        // Evento: seleccionar imagen
        cont.addEventListener("click", (e) => {
            if (e.target.classList.contains("upload-sede-imagen")) {
                e.preventDefault();
                initUploader(e.target);
            }

            if (e.target.classList.contains("remove-sede-imagen")) {
                const item = e.target.closest(".sede-item");
                item.querySelector(".sede-imagen-url").value = "";
                item.querySelector(".sede-preview").style.display = "none";
                e.target.style.display = "none";
            }
        });

    });
</script>
<h2>Imagen representativa</h2>
<p>Sube una imagen del colegio.</p>

<div style="margin-top:10px;">

    <img src="<?php echo esc_url($o['inicio']['imagen'] ?? ''); ?>"
        class="inicio-preview"
        style="max-width:250px; display:<?php echo !empty($o['inicio']['imagen']) ? 'block' : 'none'; ?>; margin-bottom:10px; border-radius:6px;">

    <input type="hidden"
        name="info_colegio_settings[inicio][imagen]"
        value="<?php echo esc_attr($o['inicio']['imagen'] ?? ''); ?>"
        class="inicio-imagen-url">

    <button type="button" class="button upload-inicio-imagen">Seleccionar Imagen</button>
    <button type="button" class="button remove-inicio-imagen"
        style="display:<?php echo !empty($o['inicio']['imagen']) ? 'inline-block' : 'none'; ?>;">
        Quitar Imagen
    </button>

</div>

<script>
    function initInicioUploader() {
        const frame = wp.media({
            title: "Seleccionar imagen para Inicio",
            button: {
                text: "Usar esta imagen"
            },
            multiple: false
        });

        frame.on("select", () => {
            const attachment = frame.state().get("selection").first().toJSON();

            document.querySelector(".inicio-imagen-url").value = attachment.url;
            document.querySelector(".inicio-preview").src = attachment.url;
            document.querySelector(".inicio-preview").style.display = "block";
            document.querySelector(".remove-inicio-imagen").style.display = "inline-block";
        });

        frame.open();
    }

    // Eventos
    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("upload-inicio-imagen")) {
            e.preventDefault();
            initInicioUploader();
        }

        if (e.target.classList.contains("remove-inicio-imagen")) {
            document.querySelector(".inicio-imagen-url").value = "";
            document.querySelector(".inicio-preview").style.display = "none";
            e.target.style.display = "none";
        }
    });
</script>