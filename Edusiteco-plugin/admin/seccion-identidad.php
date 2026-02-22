<h2 style="margin-bottom:10px;">Identidad Institucional</h2>
<p style="margin-bottom:20px;">Completa la información principal del colegio. Cada sección tiene una breve guía para ayudarte.</p>

<div class="accordion-container">

    <!-- Sección 1: Misión -->
    <div class="accordion-item">
        <button type="button" class="accordion-header">🏫 Misión</button>
        <div class="accordion-content">
            <p>Describe la <strong>razón de ser del colegio</strong>, lo que busca lograr con su comunidad educativa.</p>
            <textarea name="info_colegio_settings[mision]" rows="4" class="large-text" placeholder="Ej: Formar ciudadanos íntegros con valores humanos y competencias académicas."><?php echo esc_textarea($o['mision'] ?? ''); ?></textarea>
        </div>
    </div>

    <!-- Sección 2: Visión -->
    <div class="accordion-item">
        <button type="button" class="accordion-header">🎯 Visión</button>
        <div class="accordion-content">
            <p>Explica <strong>hacia dónde quiere llegar el colegio</strong> en el futuro o qué busca lograr a largo plazo.</p>
            <textarea name="info_colegio_settings[vision]" rows="4" class="large-text" placeholder="Ej: Ser una institución reconocida por su excelencia educativa y compromiso social."><?php echo esc_textarea($o['vision'] ?? ''); ?></textarea>
        </div>
    </div>

    <!-- Sección 3: Valores Institucionales -->
    <div class="accordion-item">
        <button type="button" class="accordion-header">💎 Valores Institucionales</button>
        <div class="accordion-content">
            <p>Agrega los valores que guían las acciones de la institución. Por ejemplo: respeto, honestidad, responsabilidad.</p>

            <div id="valores-container">
                <?php
                $valores = isset($o['valores']) && is_array($o['valores']) ? $o['valores'] : [['nombre' => '', 'descripcion' => '']];
                foreach ($valores as $index => $valor) :
                ?>
                    <div class="valor-item" style="margin-bottom:15px; border:1px solid #ddd; padding:10px; border-radius:6px;">
                        <label><strong>Nombre del Valor:</strong></label><br>
                        <input type="text" name="info_colegio_settings[valores][<?php echo $index; ?>][nombre]" value="<?php echo esc_attr($valor['nombre'] ?? ''); ?>" class="regular-text" placeholder="Ej: Respeto"><br><br>
                        <label><strong>Descripción:</strong></label><br>
                        <textarea name="info_colegio_settings[valores][<?php echo $index; ?>][descripcion]" rows="2" class="large-text" placeholder="Ej: Promovemos relaciones basadas en el respeto mutuo."><?php echo esc_textarea($valor['descripcion'] ?? ''); ?></textarea><br>
                        <button type="button" class="button remove-valor">Eliminar</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="button button-secondary" id="add-valor">+ Agregar Valor</button>
        </div>
    </div>
</div>

<!-- Estilos visuales -->
<style>
    .accordion-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #fff;
    }

    .accordion-header {
        width: 100%;
        text-align: left;
        padding: 12px 16px;
        font-size: 16px;
        background: #f7f7f7;
        border: none;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .accordion-header:hover {
        background: #eaeaea;
    }

    .accordion-content {
        display: none;
        padding: 15px;
        background: #fff;
    }

    .accordion-item.active .accordion-content {
        display: block;
    }
</style>

<!-- Script de acordeones y valores -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // --- Acordeones ---
        const accordions = document.querySelectorAll(".accordion-header");
        accordions.forEach(btn => {
            btn.addEventListener("click", () => {
                const item = btn.parentElement;
                item.classList.toggle("active");
            });
        });

        // --- Valores dinámicos ---
        const container = document.getElementById("valores-container");
        const addBtn = document.getElementById("add-valor");

        addBtn.addEventListener("click", () => {
            const index = container.querySelectorAll(".valor-item").length;
            const div = document.createElement("div");
            div.className = "valor-item";
            div.style.marginBottom = "15px";
            div.style.border = "1px solid #ddd";
            div.style.padding = "10px";
            div.style.borderRadius = "6px";
            div.innerHTML = `
            <label><strong>Nombre del Valor:</strong></label><br>
            <input type="text" name="info_colegio_settings[valores][${index}][nombre]" class="regular-text" placeholder="Ej: Responsabilidad"><br><br>
            <label><strong>Descripción:</strong></label><br>
            <textarea name="info_colegio_settings[valores][${index}][descripcion]" rows="2" class="large-text" placeholder="Ej: Asumimos compromisos con disciplina y honestidad."></textarea><br>
            <button type="button" class="button remove-valor">Eliminar</button>
        `;
            container.appendChild(div);
        });

        container.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-valor")) {
                e.target.closest(".valor-item").remove();
            }
        });
    });
</script>