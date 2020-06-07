<!-- Copyright -->
    <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
        <p>© 2018</p>
    </div>
<!--// Copyright -->
    </div>
</div>
<!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
<!-- //Required common Js -->
<!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
//paste this code under head tag or in a seperate js file.
// Wait for window load
        $(window).load(function () {
// Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
<!--// loading-gif Js -->
<!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<!--// Sidebar-nav Js -->
<!-- profile-widget-dropdown js-->
    <script src="js/script.js"></script>
<!--// profile-widget-dropdown js-->
<!-- Count-down -->
    <script src="js/simplyCountdown.js"></script>
    <link href="css/simplyCountdown.css" rel='stylesheet' type='text/css'/>
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
<!--// Count-down -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#Tables').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
                ],
				"scrollY": 200,
				"scrollX": true
            } );
        } );
    </script>
<!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
<!-- dataTable -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- //dropdown nav -->
<!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
<!-- //Js for bootstrap working -->
</body>
</html>