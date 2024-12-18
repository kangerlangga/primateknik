    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
        <div class="row pt-3">
            <div class="col text-center">
                <p>Copyright &copy; <?= date("Y")?> : <b>PT. Prima Teknikindo Raya</b> - All Rights Reserved</p>
            </div>
        </div>
    </div>
    </footer><!-- End Footer -->

    <!--Div where the WhatsApp will be rendered-->
    <div id="myDiv"></div>
    <script type="text/javascript">
    $(function () {
        $('#myDiv').floatingWhatsApp({
        phone: '6282139117365',
        size: '70px',
        popupMessage: 'Hai, Ada yang bisa saya bantu?',
        showPopup: true,
        position: "right"
        });
    });
    </script>
