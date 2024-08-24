<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Central</title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Link Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AOS  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        
    <!-- Link Styles -->
    <?php if(isset($admincss)): ?>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="/css/basis.css">
        <script src="/js/admin.js"></script>


    <?php else: ?>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/styles.css">
    <?php endif; ?>
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>
<body>

    <?php echo $contenido; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="/js/aos.js"></script>

    <?php echo $script ?? ''; ?>

</body>
</html>