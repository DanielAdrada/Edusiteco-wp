# Edusiteco - Tema de WordPress para Instituciones Educativas

## Descripción

Edusiteco es un tema de WordPress diseñado específicamente para instituciones educativas en Colombia. Su desarrollo sigue las directrices y estándares técnicos del gobierno colombiano (Normas ITA), asegurando accesibilidad, usabilidad y una correcta presentación de la información.

Este tema proporciona una base sólida y personalizable para que colegios, escuelas y otras entidades educativas puedan construir su sitio web de manera profesional.

## Características Principales

*   **Diseño Adaptable:** Totalmente responsive, se adapta a cualquier dispositivo (móviles, tabletas y computadores).
*   **Personalizable:** Opciones de personalización a través del Customizer de WordPress.
*   **Plantillas de Página:** Incluye plantillas predefinidas para páginas comunes como:
    *   Historia
    *   Misión y Visión
    *   Directorio Institucional
    *   Símbolos Institucionales
*   **Optimizado para SEO:** Estructura de código amigable para los motores de búsqueda.
*   **Desarrollo Moderno:** Utiliza Tailwind CSS para un diseño rápido y mantenible.

## Requisitos

Para instalar y desarrollar este tema, necesitarás:

*   Una instalación de WordPress (versión 5.0 o superior).
*   [Node.js](https://nodejs.org/) (versión 18.x o superior).
*   [Composer](https://getcomposer.org/).

## Instrucciones de Instalación y Desarrollo

Sigue estos pasos para levantar el proyecto en un entorno de desarrollo local:

1.  **Clonar el Repositorio:**
    Clona este repositorio en el directorio `wp-content/themes/` de tu instalación de WordPress.
    ```bash
    git clone https://github.com/Yeyoramirez17/edusiteco-theme.git
    ```

2.  **Instalar Dependencias de PHP:**
    Navega hasta el directorio del tema y ejecuta Composer para instalar las dependencias de PHP.
    ```bash
    cd wp-content/themes/edusiteco
    composer install
    ```

3.  **Instalar Dependencias de Node.js:**
    Instala los paquetes de npm necesarios para el frontend.
    ```bash
    npm install
    ```

4.  **Compilar los Assets (CSS y JS):**
    El proyecto utiliza Tailwind CSS y `@wordpress/scripts`. Compila los assets con los siguientes comandos:
    
    *   Para compilar los archivos para producción:
        ```bash
        npm run build
        ```

    *   Para compilar automáticamente mientras desarrollas:
        ```bash
        npm run dev
        ```

5.  **Activar el Tema:**
    Ve al panel de administración de WordPress (`Apariencia > Temas`) y activa el tema "Edusiteco".

¡Listo! Ahora puedes empezar a personalizar el tema y añadir contenido.