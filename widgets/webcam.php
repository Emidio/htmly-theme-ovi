<script type="text/javascript" language="JavaScript">
    function LoadNewImage()
    {
        var unique = new Date();
        document.images.webcam.src = "https://cam.reggiani.link/jpg/image.jpg?time=" + unique.getTime();
        setTimeout(LoadNewImage, 1000);
    }
</script>

<a href="#" style="text-decoration: none;" onclick="javascript: window.open('https://services.reggiani.link/webcam/index.php', 'webcam', 'width=320,height=240,resizable=no,scrollbars=no,status=no,toolbar=no,menubar=no,location=no');"><img src="https://cam.reggiani.link/jpg/image.jpg" name="webcam" width="100%"></a>

<script type="text/javascript" language="JavaScript">
    LoadNewImage();
</script>
