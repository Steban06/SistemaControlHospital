document.addEventListener('DOMContentLoaded', () => {
    // Create hidden iframe if it doesn't exist
    if (!document.getElementById('print-frame')) {
        const iframe = document.createElement('iframe');
        iframe.id = 'print-frame';
        iframe.style.position = 'fixed';
        iframe.style.right = '0';
        iframe.style.bottom = '0';
        iframe.style.width = '0';
        iframe.style.height = '0';
        iframe.style.border = '0';
        document.body.appendChild(iframe);
    }

    window.printAssetTag = function () {
        if (typeof window.printAssetTag.processing !== 'undefined' && window.printAssetTag.processing) return;
        window.printAssetTag.processing = true;

        // Read from View Modal
        const getText = (id) => {
            const el = document.getElementById(id);
            return el ? el.textContent.trim() : 'N/A';
        };

        const codigo = getText('modal-bn-id');
        const nombre = getText('modal-bn-nombre');
        const categoria = getText('modal-bn-categoria');
        const ubicacion = getText('modal-bn-area');

        const qrEl = document.getElementById('modal-qr-code');
        const qrSrc = qrEl ? qrEl.src : '';

        const printContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Etiqueta de Activo</title>
                <style>
                    body {
                        font-family: 'Segoe UI', Arial, sans-serif;
                        margin: 0;
                        padding: 20px;
                        display: flex;
                        justify-content: center;
                    }
                    .tag-container {
                        border: 2px solid #000;
                        padding: 15px;
                        width: 300px;
                        text-align: center;
                        background: white;
                    }
                    .tag-title {
                        margin: 0 0 5px 0;
                        font-size: 16px;
                        text-transform: uppercase;
                        font-weight: bold;
                    }
                    .tag-code {
                        margin: 5px 0;
                        font-size: 18px;
                        font-weight: bold;
                        font-family: monospace;
                    }
                    .qr-code {
                        margin: 10px auto;
                        width: 100px;
                        height: 100px;
                        display: block;
                    }
                    .tag-details {
                        text-align: left;
                        margin: 10px 0;
                        font-size: 12px;
                        line-height: 1.5;
                        border-top: 1px dotted #ccc;
                        padding-top: 10px;
                    }
                    .tag-footer {
                        font-size: 10px;
                        color: #666;
                        margin-top: 5px;
                    }
                </style>
            </head>
            <body>
                <div class="tag-container">
                    <h2 class="tag-title">${nombre}</h2>
                    ${qrSrc ? `<img src="${qrSrc}" class="qr-code" alt="QR Code">` : ''}
                    <div class="tag-code">${codigo}</div>
                    <div class="tag-details">
                        <strong>Ubicación:</strong> ${ubicacion}<br>
                        <strong>Categoría:</strong> ${categoria}
                    </div>
                    <div class="tag-footer">HOSPITAL VIRGEN DEL VALLE</div>
                </div>
            </body>
            </html>
        `;

        const iframe = document.getElementById('print-frame');
        const doc = iframe.contentWindow.document;

        doc.open();
        doc.write(printContent);
        doc.close();

        // Wait for content to load then print
        setTimeout(() => {
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
            window.printAssetTag.processing = false;
        }, 800);
    };
});
