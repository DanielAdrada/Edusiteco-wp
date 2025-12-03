            <!-- ===================== -->
            <!-- Directorio Institucional -->
            <!-- ===================== -->
            <h2>Directorio Institucional</h2>
            <p>Agrega los miembros del equipo directivo (foto, nombre, cargo, correo institucional y teléfono).</p>

            <div id="directivos-container">
                <?php
                $o = get_option('info_colegio_settings');
                $directivos = isset($o['directivos']) && is_array($o['directivos'])
                    ? $o['directivos']
                    : [['foto' => '', 'nombre' => '', 'cargo' => '', 'correo' => '', 'telefono' => '']];
                foreach ($directivos as $index => $d) :
                ?>
                    <div class="directivo-item" style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
                        <label><strong>Foto del Directivo:</strong></label><br>
                        <input type="text" name="info_colegio_settings[directivos][<?php echo $index; ?>][foto]"
                            value="<?php echo esc_attr($d['foto'] ?? ''); ?>"
                            class="regular-text upload-foto-url"
                            placeholder="URL de la imagen o usa el botón de carga">
                        <button type="button" class="button upload-foto-btn">Subir Imagen</button><br><br>

                        <label><strong>Nombre:</strong></label><br>
                        <input type="text" name="info_colegio_settings[directivos][<?php echo $index; ?>][nombre]"
                            value="<?php echo esc_attr($d['nombre'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: María Rodríguez"><br><br>

                        <label><strong>Cargo:</strong></label><br>
                        <input type="text" name="info_colegio_settings[directivos][<?php echo $index; ?>][cargo]"
                            value="<?php echo esc_attr($d['cargo'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: Rectora"><br><br>

                        <label><strong>Correo institucional:</strong></label><br>
                        <input type="email" name="info_colegio_settings[directivos][<?php echo $index; ?>][correo]"
                            value="<?php echo esc_attr($d['correo'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: maria.rodriguez@colegio.edu.co"><br><br>

                        <label><strong>Teléfono:</strong></label><br>
                        <input type="text" name="info_colegio_settings[directivos][<?php echo $index; ?>][telefono]"
                            value="<?php echo esc_attr($d['telefono'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: 3201234567"><br><br>

                        <button type="button" class="button remove-directivo">Eliminar</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="button button-secondary" id="add-directivo">+ Agregar Directivo</button>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const container = document.getElementById("directivos-container");
                    const addBtn = document.getElementById("add-directivo");

                    // Agregar nuevo directivo
                    addBtn.addEventListener("click", () => {
                        const index = container.querySelectorAll(".directivo-item").length;
                        const div = document.createElement("div");
                        div.className = "directivo-item";
                        div.style.marginBottom = "20px";
                        div.style.border = "1px solid #ddd";
                        div.style.padding = "15px";
                        div.style.borderRadius = "6px";
                        div.innerHTML = `
            <label><strong>Foto del Directivo:</strong></label><br>
            <input type="text" name="info_colegio_settings[directivos][${index}][foto]" class="regular-text upload-foto-url" placeholder="URL de la imagen o usa el botón de carga">
            <button type="button" class="button upload-foto-btn">Subir Imagen</button><br><br>

            <label><strong>Nombre:</strong></label><br>
            <input type="text" name="info_colegio_settings[directivos][${index}][nombre]" class="regular-text" placeholder="Ej: María Rodríguez"><br><br>

            <label><strong>Cargo:</strong></label><br>
            <input type="text" name="info_colegio_settings[directivos][${index}][cargo]" class="regular-text" placeholder="Ej: Rectora"><br><br>

            <label><strong>Correo institucional:</strong></label><br>
            <input type="email" name="info_colegio_settings[directivos][${index}][correo]" class="regular-text" placeholder="Ej: maria.rodriguez@colegio.edu.co"><br><br>

            <label><strong>Teléfono:</strong></label><br>
            <input type="text" name="info_colegio_settings[directivos][${index}][telefono]" class="regular-text" placeholder="Ej: 3201234567"><br><br>

            <button type="button" class="button remove-directivo">Eliminar</button>
        `;
                        container.appendChild(div);
                    });

                    // Eliminar directivo
                    container.addEventListener("click", (e) => {
                        if (e.target.classList.contains("remove-directivo")) {
                            e.target.closest(".directivo-item").remove();
                        }
                    });

                    // Subir imagen con wp.media
                    jQuery(document).ready(function($) {
                        let frame;
                        $(document).on('click', '.upload-foto-btn', function(e) {
                            e.preventDefault();
                            const button = $(this);
                            if (frame) frame.close();
                            frame = wp.media({
                                title: 'Seleccionar o subir foto del directivo',
                                button: {
                                    text: 'Usar esta imagen'
                                },
                                multiple: false
                            });
                            frame.on('select', function() {
                                const attachment = frame.state().get('selection').first().toJSON();
                                button.siblings('.upload-foto-url').val(attachment.url);
                            });
                            frame.open();
                        });
                    });
                });
            </script>

            <!-- ===================== -->
            <!-- Coordinaciones y Áreas -->
            <!-- ===================== -->
            <h2>Coordinaciones y Áreas</h2>
            <div id="areas-container">
                <?php
                $o = get_option('info_colegio_settings');
                $areas = isset($o['areas']) && is_array($o['areas'])
                    ? $o['areas']
                    : [['foto' => '', 'nombre' => '', 'cargo' => '', 'correo' => '', 'telefono' => '']];

                foreach ($areas as $index => $a) :
                ?>
                    <div class="area-item" style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
                        <label><strong>Foto:</strong></label><br>
                        <input type="text" name="info_colegio_settings[areas][<?php echo $index; ?>][foto]"
                            value="<?php echo esc_attr($a['foto'] ?? ''); ?>"
                            class="regular-text upload-foto-url"
                            placeholder="URL de la imagen o usa el botón de carga">
                        <button type="button" class="button upload-foto-btn">Subir Imagen</button><br><br>

                        <label><strong>Nombre:</strong></label><br>
                        <input type="text" name="info_colegio_settings[areas][<?php echo $index; ?>][nombre]"
                            value="<?php echo esc_attr($a['nombre'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: Carlos Pérez"><br><br>

                        <label><strong>Cargo o Área:</strong></label><br>
                        <input type="text" name="info_colegio_settings[areas][<?php echo $index; ?>][cargo]"
                            value="<?php echo esc_attr($a['cargo'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: Coordinador de Convivencia"><br><br>

                        <label><strong>Correo institucional:</strong></label><br>
                        <input type="email" name="info_colegio_settings[areas][<?php echo $index; ?>][correo]"
                            value="<?php echo esc_attr($a['correo'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: carlos.perez@colegio.edu.co"><br><br>

                        <label><strong>Teléfono:</strong></label><br>
                        <input type="text" name="info_colegio_settings[areas][<?php echo $index; ?>][telefono]"
                            value="<?php echo esc_attr($a['telefono'] ?? ''); ?>"
                            class="regular-text" placeholder="Ej: 3101234567"><br><br>

                        <button type="button" class="button remove-area">Eliminar</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="button button-secondary" id="add-area">+ Agregar Coordinación o Área</button>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const container = document.getElementById("areas-container");
                    const addBtn = document.getElementById("add-area");

                    // Agregar nueva coordinación/área
                    addBtn.addEventListener("click", () => {
                        const index = container.querySelectorAll(".area-item").length;
                        const div = document.createElement("div");
                        div.className = "area-item";
                        div.style.marginBottom = "20px";
                        div.style.border = "1px solid #ddd";
                        div.style.padding = "15px";
                        div.style.borderRadius = "6px";
                        div.innerHTML = `
            <label><strong>Foto:</strong></label><br>
            <input type="text" name="info_colegio_settings[areas][${index}][foto]" class="regular-text upload-foto-url" placeholder="URL de la imagen o usa el botón de carga">
            <button type="button" class="button upload-foto-btn">Subir Imagen</button><br><br>

            <label><strong>Nombre:</strong></label><br>
            <input type="text" name="info_colegio_settings[areas][${index}][nombre]" class="regular-text" placeholder="Ej: Carlos Pérez"><br><br>

            <label><strong>Cargo o Área:</strong></label><br>
            <input type="text" name="info_colegio_settings[areas][${index}][cargo]" class="regular-text" placeholder="Ej: Coordinador Académico"><br><br>

            <label><strong>Correo institucional:</strong></label><br>
            <input type="email" name="info_colegio_settings[areas][${index}][correo]" class="regular-text" placeholder="Ej: carlos.perez@colegio.edu.co"><br><br>

            <label><strong>Teléfono:</strong></label><br>
            <input type="text" name="info_colegio_settings[areas][${index}][telefono]" class="regular-text" placeholder="Ej: 3101234567"><br><br>

            <button type="button" class="button remove-area">Eliminar</button>
        `;
                        container.appendChild(div);
                    });

                    // Eliminar área
                    container.addEventListener("click", (e) => {
                        if (e.target.classList.contains("remove-area")) {
                            e.target.closest(".area-item").remove();
                        }
                    });

                    // Subir imagen con wp.media
                    jQuery(document).ready(function($) {
                        let frame;
                        $(document).on('click', '.upload-foto-btn', function(e) {
                            e.preventDefault();
                            const button = $(this);
                            if (frame) frame.close();
                            frame = wp.media({
                                title: 'Seleccionar o subir foto',
                                button: {
                                    text: 'Usar esta imagen'
                                },
                                multiple: false
                            });
                            frame.on('select', function() {
                                const attachment = frame.state().get('selection').first().toJSON();
                                button.siblings('.upload-foto-url').val(attachment.url);
                            });
                            frame.open();
                        });
                    });
                });
            </script>

            <!-- ===================== -->
            <!-- Contactos Generales -->
            <!-- ===================== -->
            <h2>Contactos Generales</h2>
            <p>Agrega los contactos institucionales: correo, teléfonos o direcciones.</p>

            <div id="contactos-container">
                <?php
                $o = get_option('info_colegio_settings');
                $contactos = isset($o['contactos']) && is_array($o['contactos'])
                    ? $o['contactos']
                    : [['titulo' => '', 'descripcion' => '', 'valor' => '']];

                foreach ($contactos as $index => $c) :
                ?>
                    <div class="contacto-item" style="margin-bottom:20px; border:1px solid #ddd; padding:15px; border-radius:6px;">
                        <label><strong>Nombre o Título:</strong></label><br>
                        <input type="text" name="info_colegio_settings[contactos][<?php echo $index; ?>][titulo]"
                            value="<?php echo esc_attr($c['titulo'] ?? ''); ?>"
                            class="regular-text"
                            placeholder="Ej: Correo Institucional, Sede Principal, Atención al ciudadano"><br><br>

                        <label><strong>Descripción:</strong></label><br>
                        <input type="text" name="info_colegio_settings[contactos][<?php echo $index; ?>][descripcion]"
                            value="<?php echo esc_attr($c['descripcion'] ?? ''); ?>"
                            class="regular-text"
                            placeholder="Ej: Para información general y consultas"><br><br>

                        <label><strong>Correo / Teléfono / Dirección:</strong></label><br>
                        <input type="text" name="info_colegio_settings[contactos][<?php echo $index; ?>][valor]"
                            value="<?php echo esc_attr($c['valor'] ?? ''); ?>"
                            class="regular-text"
                            placeholder="Ej: info@colegio.edu.co o 3101234567 o Calle 10 #12-34"><br><br>

                        <button type="button" class="button remove-contacto">Eliminar</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="button button-secondary" id="add-contacto">+ Agregar Contacto</button>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const container = document.getElementById("contactos-container");
                    const addBtn = document.getElementById("add-contacto");

                    // Agregar nuevo contacto
                    addBtn.addEventListener("click", () => {
                        const index = container.querySelectorAll(".contacto-item").length;
                        const div = document.createElement("div");
                        div.className = "contacto-item";
                        div.style.marginBottom = "20px";
                        div.style.border = "1px solid #ddd";
                        div.style.padding = "15px";
                        div.style.borderRadius = "6px";
                        div.innerHTML = `
            <label><strong>Nombre o Título:</strong></label><br>
            <input type="text" name="info_colegio_settings[contactos][${index}][titulo]" class="regular-text" placeholder="Ej: Correo Institucional, Sede Principal, Atención al ciudadano"><br><br>

            <label><strong>Descripción:</strong></label><br>
            <input type="text" name="info_colegio_settings[contactos][${index}][descripcion]" class="regular-text" placeholder="Ej: Para información general y consultas"><br><br>

            <label><strong>Correo / Teléfono / Dirección:</strong></label><br>
            <input type="text" name="info_colegio_settings[contactos][${index}][valor]" class="regular-text" placeholder="Ej: info@colegio.edu.co o 3101234567 o Calle 10 #12-34"><br><br>

            <button type="button" class="button remove-contacto">Eliminar</button>
        `;
                        container.appendChild(div);
                    });


                    // Eliminar contacto
                    container.addEventListener("click", (e) => {
                        if (e.target.classList.contains("remove-contacto")) {
                            e.target.closest(".contacto-item").remove();
                        }
                    });
                });
            </script>