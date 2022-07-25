<style type="text/css">
.backdrop-white{
	-webkit-backdrop-filter: saturate(180%) blur(20px);
    backdrop-filter: saturate(180%) blur(20px);
    background-color: rgba(255,255,255,.72) !important;
}
</style>
<header id="page-header" class="backdrop-white">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">

                        <!-- Layout Options (used just for demonstration) -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <div class="btn-group" role="group">
                            <a href="/" class="btn btn-circle btn-dual-secondary">
                                <i class="fa fa-home"></i>
                            </a>
                        </div>
						<div class="btn-group" role="group">
                            <a class="btn btn-circle btn-dual-secondary d-none d-xl-block" data-toggle="layout" data-action="content_layout_toggle" href="javascript:void(0)">
                                <i class="si si-screen-desktop"></i>
                            </a>
                        </div>
                        <!-- END Layout Options -->
                    </div>
                    <!-- END Left Section -->
<?php if (!isset($_SESSION["usersn"])){ ?>
                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เข้าสู่ระบบ<i class="fa fa-angle-down ml-5"></i></button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item" href="../../member/login.php?redirect=<?php echo $redirect_url; ?>">
                                    <i class="fa fa-unlock-alt mr-5"></i> เข้าสู่ระบบ
                                </a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../../member/join.php">
                                    <i class="fa fa-plus mr-5"></i> สมัครไอดีใหม่
                                </a>
								<a class="dropdown-item" href="../../member/recover.php">
                                    <i class="fa fa-warning mr-5"></i> ลืมรหัสผ่าน
                                </a>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
<?php }else{ ?>
                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["username"]; ?><i class="fa fa-angle-down ml-5"></i></button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item" href="../../member">
								ข้อมูลโดยทั่วไป
                                </a>
								<a class="dropdown-item" href="../../member/history-logingame.php">
								ประวัติการเข้าเกม
                                </a>
								<a class="dropdown-item" href="../../member/history-buyitem.php">
								ประวัติการซื้อสินค้า
                                </a>
								<a class="dropdown-item" href="../../member/history-sellitem.php">
								ประวัติการขายสินค้า
                                </a>
								<a class="dropdown-item" href="../../member/history-event.php">
								ประวัติเข้าร่วมกิจกรรม
                                </a>
								<a class="dropdown-item" href="../../kyc">
								เปลี่ยนแปลงข้อมูล
                                </a>
								<a class="dropdown-item" href="../../support">
								สอบถาม/แจ้งปัญหา
                                </a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0)" onclick="doLogout()">
                                    <i class="si si-logout mr-5"></i> ออกจากระบบ
                                </a>						
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
<?php } ?>
                </div>
                <!-- END Header Content -->
            </header>
            <!-- END Header -->
<div class="modal fade" id="ModalSecret" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
</div>
<div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
</div>
<div class="modal fade" id="ModalRecvList" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
</div>
<div class="modal fade" id="ModalGCode" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
</div>