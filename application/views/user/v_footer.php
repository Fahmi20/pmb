
    <!-- Footer START -->
    <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2023 YPGS IT Division. All rights reserved.</p>
                      
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Quick View</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>            
            </div>
            <!-- Quick View END -->
        </div>
    </div>
     
   
   <!-- Core Vendors JS -->
    <script src="<?php echo base_url();?>assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- page js -->
    <script src="<?php echo base_url();?>assets/vendors/select2/select2.min.js"></script>
    <!-- Core JS --><script>
    $('.select2').select2();

    $(".select_departemen").select2({
            minimumResultsForSearch: Infinity
    });

</script>

    <script src="<?php echo base_url();?>assets/js/app.min.js"></script>

</body>

</html>