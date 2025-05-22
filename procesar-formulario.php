<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'] ?? '';
  $apellido = $_POST['apellido'] ?? '';
  $email = $_POST['email'] ?? '';
  $mensaje = $_POST['mensaje'] ?? '';

  // Validar campos básicos (por seguridad)
  if (!$nombre || !$apellido || !$email || !$mensaje) {
    echo json_encode(['success' => false]);
    exit;
  }

  $para = "gabrielperex@gmail.com"; 
  $asunto = "Nuevo mensaje desde el formulario";
  $contenido = "Nombre: $nombre $apellido\nEmail: $email\n\nMensaje:\n$mensaje";
  $headers = "From: no-reply@tudominio.com\r\nReply-To: $email";

  $enviado = mail($para, $asunto, $contenido, $headers);

  echo json_encode(['success' => $enviado]);
  exit;
}
echo json_encode(['success' => false]);
exit;
?>
