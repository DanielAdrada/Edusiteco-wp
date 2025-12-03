jQuery(document).ready(function($) {
    let currentZoom = 1;
    let talkbackEnabled = false;
    let isDragging = false;
    let offsetX = 0, offsetY = 0;

    const toggleBtn = $('#accessibility-toggle');
    const panel = $('#accessibility-panel');
    const menu = $('#accessibility-menu');

    /* ===============================
       PANEL INTELIGENTE Y AUTOAJUSTABLE
    =============================== */

    function togglePanel(show = null) {
        const visible = panel.is(':visible');
        const shouldShow = show !== null ? show : !visible;

        if (shouldShow) {
            autoRepositionButton();  // 👈 mueve el botón si está demasiado al borde
            adjustPanelPosition();   // orienta el panel según espacio
            panel.fadeIn(200);
            toggleBtn.attr('aria-expanded', 'true');
            panel.attr('aria-hidden', 'false');
        } else {
            panel.fadeOut(200);
            toggleBtn.attr('aria-expanded', 'false');
            panel.attr('aria-hidden', 'true');
        }
    }

    // Detecta posición y mueve el botón si está muy al borde
    function autoRepositionButton() {
        const winW = $(window).width();
        const winH = $(window).height();
        const menuRect = menu[0].getBoundingClientRect();
        let moved = false;

        let newLeft = menuRect.left;
        let newTop = menuRect.top;

        // Si está muy a la derecha → moverlo más a la izquierda
        if (menuRect.right > winW - 120) {
            newLeft = winW - 140;
            moved = true;
        }

        // Si está muy a la izquierda → moverlo más al centro
        if (menuRect.left < 20) {
            newLeft = 40;
            moved = true;
        }

        // Si está muy abajo → subirlo un poco
        if (menuRect.bottom > winH - 120) {
            newTop = winH - 160;
            moved = true;
        }

        // Si está muy arriba → bajarlo un poco
        if (menuRect.top < 20) {
            newTop = 40;
            moved = true;
        }

        if (moved) {
            menu.css({
                top: newTop + 'px',
                left: newLeft + 'px',
                bottom: 'auto',
                right: 'auto',
                position: 'fixed'
            });
        }
    }

    // Ajusta la dirección de apertura del panel
    function adjustPanelPosition() {
        const winW = $(window).width();
        const winH = $(window).height();
        const menuRect = menu[0].getBoundingClientRect();
        const panelHeight = panel.outerHeight();
        const panelWidth = panel.outerWidth();

        panel.removeClass('open-left open-up').css({
            top: '',
            bottom: '',
            left: '',
            right: ''
        });

        // Si no hay espacio a la derecha → abrir hacia la izquierda
        if (menuRect.right + panelWidth > winW) {
            panel.addClass('open-left');
            panel.css({ right: '70px', left: 'auto' });
        } else {
            panel.css({ left: '70px', right: 'auto' });
        }

        // Si no hay espacio abajo → abrir hacia arriba
        if (menuRect.bottom + panelHeight > winH) {
            panel.addClass('open-up');
            panel.css({ top: 'auto', bottom: '70px' });
        } else {
            panel.css({ top: '0', bottom: 'auto' });
        }
    }

    /* ===============================
       EVENTOS PRINCIPALES
    =============================== */
    toggleBtn.on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            togglePanel();
        }
    });

    $(document).on('click touchstart', function(e) {
        if (!menu.is(e.target) && menu.has(e.target).length === 0) {
            togglePanel(false);
        }
    });

    /* ===============================
       ARRASTRAR BOTÓN
    =============================== */
    function setMenuPosition(x, y) {
        const winW = $(window).width();
        const winH = $(window).height();
        const menuW = menu.outerWidth();
        const menuH = menu.outerHeight();

        const newX = Math.max(10, Math.min(x, winW - menuW - 10));
        const newY = Math.max(10, Math.min(y, winH - menuH - 10));

        menu.css({
            top: newY + 'px',
            left: newX + 'px',
            bottom: 'auto',
            right: 'auto',
            position: 'fixed'
        });
    }

    toggleBtn.on('mousedown touchstart', function(e) {
        isDragging = true;
        const evt = e.type === 'touchstart' ? e.touches[0] : e;
        const rect = menu[0].getBoundingClientRect();
        offsetX = evt.clientX - rect.left;
        offsetY = evt.clientY - rect.top;
        toggleBtn.css('cursor', 'grabbing');
        e.preventDefault();
    });

    $(document).on('mousemove touchmove', function(e) {
        if (isDragging) {
            const evt = e.type === 'touchmove' ? e.touches[0] : e;
            setMenuPosition(evt.clientX - offsetX, evt.clientY - offsetY);
        }
    });

    $(document).on('mouseup touchend', function() {
        if (isDragging) {
            isDragging = false;
            toggleBtn.css('cursor', 'grab');
        }
    });

    /* ===============================
       FUNCIONALIDADES DE ACCESIBILIDAD
    =============================== */
    $('#increase-text').on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter') {
            e.preventDefault();
            currentZoom += 0.1;
            $('html').css('font-size', `${currentZoom}em`);
        }
    });

    $('#decrease-text').on('click keydown', function(e) {
        if ((e.type === 'click' || e.key === 'Enter') && currentZoom > 0.6) {
            e.preventDefault();
            currentZoom -= 0.1;
            $('html').css('font-size', `${currentZoom}em`);
        }
    });

    $('#toggle-daltonic').on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter') $('body').toggleClass('daltonic');
    });

    $('#toggle-gray').on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter') $('body').toggleClass('gray');
    });

    $('#toggle-contrast').on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter') $('body').toggleClass('high-contrast');
    });

    $('#toggle-talkback').on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter') {
            talkbackEnabled = !talkbackEnabled;
            alert(talkbackEnabled
                ? "TalkBack activado: toque o presione Enter sobre cualquier texto para escucharlo."
                : "TalkBack desactivado.");
        }
    });

    $('body').on('click keydown', '*', function(e) {
        if (talkbackEnabled && (e.type === 'click' || e.key === 'Enter')) {
            e.stopPropagation();
            const text = $(this).text().trim();
            if (text.length > 0) {
                const msg = new SpeechSynthesisUtterance(text);
                msg.lang = 'es-ES';
                window.speechSynthesis.cancel();
                window.speechSynthesis.speak(msg);
            }
        }
    });

    $('#reset-accessibility').on('click keydown', function(e) {
        if (e.type === 'click' || e.key === 'Enter') {
            $('body').removeClass('daltonic gray high-contrast');
            $('html').css('font-size', '1em');
            currentZoom = 1;
            talkbackEnabled = false;
            window.speechSynthesis.cancel();
            alert("Preferencias de accesibilidad restablecidas.");
        }
    });

    /* ===============================
       REAJUSTE EN CAMBIO DE ORIENTACIÓN
    =============================== */
    $(window).on('resize orientationchange', function() {
        const pos = menu[0].getBoundingClientRect();
        setMenuPosition(pos.left, pos.top);
    });

    /* ======================= */
/*     ESPACIADO           */
/* ======================= */
$('#increase-spacing').on('click', function () {
    $('body').addClass('spacing-big').removeClass('spacing-normal');
});

$('#decrease-spacing').on('click', function () {
    $('body').removeClass('spacing-big').addClass('spacing-normal');
});

/* ======================= */
/*  FUENTE DISLÉXICOS      */
/* ======================= */
$('#dyslexia-font').on('click', function () {
    $('body').toggleClass('dyslexia-font');
});

/* ======================= */
/*  FUENTE DE SEÑAS        */
/* ======================= */
$('#sign-font').on('click', function () {
    $('body').toggleClass('sign-font');
});

/* ======================= */
/*     CURSOR GRANDE       */
/* ======================= */
$('#big-cursor').on('click', function () {
    $('body').toggleClass('big-cursor');
});



/* ======================= */
/*     LÍNEA DE LECTURA    */
/* ======================= */
$('body').append('<div id="readingLine"></div>');

let readingActive = false;

$('#reading-line').on('click', function () {
    readingActive = !readingActive;
    if (readingActive) {
        $('#readingLine').show();
        $(document).on('mousemove.readingLine', function (e) {
            $('#readingLine').css('top', e.clientY - 30);
        });
    } else {
        $('#readingLine').hide();
        $(document).off('mousemove.readingLine');
    }
});

/* ======================= */
/*   RESALTAR ENLACES      */
/* ======================= */
$('#highlight-links').on('click', function () {
    $('body').toggleClass('highlight-links');
});

/* ======================= */
/*   CENTRO DE RELEVO      */
/* ======================= */
$('body').append(`
<div id="relayModal">
    <h3>Centro de Relevo</h3>
    <p>Comunícate con un operador aquí:</p>
    <a href="https://centroderelevo.gov.co" target="_blank">Abrir servicio</a>
    <br><br>
    <button onclick="$('#relayModal').hide()">Cerrar</button>
</div>
`);

$('#relay-center').on('click', function () {
    $('#relayModal').show();
});
$('#reset-accessibility').on('click', function () {
    $('body')
        .removeClass('spacing-big spacing-normal')
        .removeClass('dyslexia-font')
        .removeClass('sign-font')
        .removeClass('big-cursor')
        .removeClass('highlight-links');

    $('#readingLine').hide();
    readingActive = false;
});

});
