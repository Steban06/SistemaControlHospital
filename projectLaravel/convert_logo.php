<?php
/**
 * Script mejorado para crear un logo PNG más visible
 */

$pngPath = __DIR__ . '/public/images/logo-hospital.png';

// Crear una imagen más grande y visible
$width = 200;
$height = 80;

$image = imagecreatetruecolor($width, $height);

// Hacer el fondo transparente
imagesavealpha($image, true);
$transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $transparent);

// Colores institucionales
$tealColor = imagecolorallocate($image, 13, 148, 136); // Verde teal #0d9488
$darkColor = imagecolorallocate($image, 30, 41, 59); // Gris oscuro #1e293b
$bgColor = imagecolorallocate($image, 240, 253, 250); // Fondo claro #f0fdfa

// Dibujar un rectángulo con borde redondeado
imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

// Dibujar un círculo/cruz médica simple
$centerX = 40;
$centerY = 40;

// Cruz médica (símbolo +)
imagefilledrectangle($image, $centerX - 5, $centerY - 20, $centerX + 5, $centerY + 20, $tealColor); // Vertical
imagefilledrectangle($image, $centerX - 20, $centerY - 5, $centerX + 20, $centerY + 5, $tealColor); // Horizontal

// Agregar texto "HVV"
$fontSize = 5; // Tamaño de fuente (1-5)
$text = "HVV";
$textX = 80;
$textY = 25;
imagestring($image, $fontSize, $textX, $textY, $text, $darkColor);

// Agregar texto "Hospital"
$text2 = "HOSPITAL";
imagestring($image, 3, $textX, $textY + 20, $text2, $tealColor);

// Guardar la imagen
$result = imagepng($image, $pngPath, 9); // Máxima compresión
imagedestroy($image);

if ($result) {
    echo "✅ Logo PNG creado exitosamente\n";
    echo "📁 Ubicación: {$pngPath}\n";
    echo "📐 Dimensiones: {$width}x{$height}px\n";
    echo "💾 Tamaño: " . filesize($pngPath) . " bytes\n";
} else {
    echo "❌ Error al crear el logo PNG\n";
}
