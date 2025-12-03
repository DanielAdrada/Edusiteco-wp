<!-- Contenedor principal -->

<div style="display: flex; gap: 50px; align-items: flex-start;">
    <style>
        /* Ajusta todas las tablas del plugin */
        .form-table th {
            width: 100px;
            text-align: left;
            padding-right: 10px;
            vertical-align: middle;
        }

        .form-table td {
            padding: 5px 0;
        }

        .form-table input.regular-text {
            width: 250px;
        }
    </style>

    <!-- Contenedor principal -->
    <div style="display: flex; gap: 10px; align-items: flex-start;">
    </div>

    <!-- ===================== -->
    <!-- REDES SOCIALES -->
    <!-- ===================== -->
    <div style="flex: 1;">
        <h2>Redes Sociales</h2>
        <p>Agrega los enlaces oficiales de las redes sociales de la institución. Solo se mostrarán los campos que tengan un enlace válido.</p>

        <table class="form-table">
            <tr>
                <th scope="row"><label for="facebook">Facebook</label></th>
                <td>
                    <input type="url" id="facebook" name="info_colegio_settings[facebook]" value="<?php echo esc_attr($o['facebook'] ?? ''); ?>" class="regular-text" placeholder="https://www.facebook.com/Institucion">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="instagram">Instagram</label></th>
                <td>
                    <input type="url" id="instagram" name="info_colegio_settings[instagram]" value="<?php echo esc_attr($o['instagram'] ?? ''); ?>" class="regular-text" placeholder="https://www.instagram.com/Institucion">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="twitter">X (Twitter)</label></th>
                <td>
                    <input type="url" id="twitter" name="info_colegio_settings[twitter]" value="<?php echo esc_attr($o['twitter'] ?? ''); ?>" class="regular-text" placeholder="https://x.com/Institucion">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="youtube">YouTube</label></th>
                <td>
                    <input type="url" id="youtube" name="info_colegio_settings[youtube]" value="<?php echo esc_attr($o['youtube'] ?? ''); ?>" class="regular-text" placeholder="https://www.youtube.com/@Institucion">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="tiktok">TikTok</label></th>
                <td>
                    <input type="url" id="tiktok" name="info_colegio_settings[tiktok]" value="<?php echo esc_attr($o['tiktok'] ?? ''); ?>" class="regular-text" placeholder="https://www.tiktok.com/@Institucion">
                </td>
            </tr>
        </table>
    </div>
</div>