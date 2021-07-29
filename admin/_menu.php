 <section>
     <!-- Left Sidebar -->
     <aside id="leftsidebar" class="sidebar">
         <!-- User Info -->
         <div class="user-info">
             <div class="image">
                 <img src="../assets/images/user.png" width="48" height="48" alt="User" />
             </div>
             <div class="info-container">
                 <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['admin']['username'] ?></div>
                 <div class="email"><?php echo $_SESSION['admin']['nama_user'] ?></div>
                 <div class="btn-group user-helper-dropdown">
                     <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                     <ul class="dropdown-menu pull-right">
                         <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                         <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                     </ul>
                 </div>
             </div>
         </div>
         <!-- #User Info -->
         <!-- Menu -->
         <div class="menu">
             <ul class="list">
                 <li class="header">MAIN NAVIGATION</li>
                 <li class="active">
                     <a href=".">
                         <i class="material-icons">home</i>
                         <span>Home</span>
                     </a>
                 </li>

                 <li>
                     <a href="javascript:void(0);" class="menu-toggle">
                         <i class="material-icons">assignment</i>
                         <span>Master Data</span>
                     </a>
                     <ul class="ml-menu">
                         <li>
                             <a href="master_user.php">Data User</a>
                         </li>
                         <li>
                             <a href="data_karyawan.php">Data Karyawan</a>
                         </li>
                         <li>
                             <a href="data_mes.php">Data Mess</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="javascript:void(0);" class="menu-toggle">
                         <i class="material-icons">view_list</i>
                         <span>Transaksi</span>
                     </a>
                     <ul class="ml-menu">
                         <li>
                             <a href="trans_karyawan.php">Karyawan - Mess</a>
                         </li>
                         <li>
                             <a href="trans_keluar.php">Izin Keluar</a>
                         </li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript:void(0);" class="menu-toggle">
                         <i class="material-icons">perm_media</i>
                         <span>Laporan</span>
                     </a>
                     <ul class="ml-menu">
                         <li>
                             <a href="lap_karyawan.php">Data Karyawan</a>
                         </li>
                         <li>
                             <a href="lap_data_keluar">Data Izin Keluar</a>
                         </li>
                         <li>
                             <a href="lap_masuk.php">Data Izin Masuk</a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </div>
         <!-- #Menu -->
         <!-- Footer -->
         <div class="legal">
             <div class="copyright">
                 &copy; 2021<a href="javascript:void(0);">Asrama Putri PT Elegant Textile Industry Purwakarta</a>.
             </div>
             <!-- #Footer -->
     </aside>
     <!-- #END# Left Sidebar -->
     <!-- Right Sidebar -->
     <aside id="rightsidebar" class="right-sidebar">
         <ul class="nav nav-tabs tab-nav-right" role="tablist">
             <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
         </ul>
         <div class="tab-content">
             <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                 <ul class="demo-choose-skin">
                     <li data-theme="red" class="active">
                         <div class="red"></div>
                         <span>Red</span>
                     </li>
                     <li data-theme="pink">
                         <div class="pink"></div>
                         <span>Pink</span>
                     </li>
                     <li data-theme="purple">
                         <div class="purple"></div>
                         <span>Purple</span>
                     </li>
                     <li data-theme="deep-purple">
                         <div class="deep-purple"></div>
                         <span>Deep Purple</span>
                     </li>
                     <li data-theme="indigo">
                         <div class="indigo"></div>
                         <span>Indigo</span>
                     </li>
                     <li data-theme="blue">
                         <div class="blue"></div>
                         <span>Blue</span>
                     </li>
                     <li data-theme="light-blue">
                         <div class="light-blue"></div>
                         <span>Light Blue</span>
                     </li>
                     <li data-theme="cyan">
                         <div class="cyan"></div>
                         <span>Cyan</span>
                     </li>
                     <li data-theme="teal">
                         <div class="teal"></div>
                         <span>Teal</span>
                     </li>
                     <li data-theme="green">
                         <div class="green"></div>
                         <span>Green</span>
                     </li>
                     <li data-theme="light-green">
                         <div class="light-green"></div>
                         <span>Light Green</span>
                     </li>
                     <li data-theme="lime">
                         <div class="lime"></div>
                         <span>Lime</span>
                     </li>
                     <li data-theme="yellow">
                         <div class="yellow"></div>
                         <span>Yellow</span>
                     </li>
                     <li data-theme="amber">
                         <div class="amber"></div>
                         <span>Amber</span>
                     </li>
                     <li data-theme="orange">
                         <div class="orange"></div>
                         <span>Orange</span>
                     </li>
                     <li data-theme="deep-orange">
                         <div class="deep-orange"></div>
                         <span>Deep Orange</span>
                     </li>
                     <li data-theme="brown">
                         <div class="brown"></div>
                         <span>Brown</span>
                     </li>
                     <li data-theme="grey">
                         <div class="grey"></div>
                         <span>Grey</span>
                     </li>
                     <li data-theme="blue-grey">
                         <div class="blue-grey"></div>
                         <span>Blue Grey</span>
                     </li>
                     <li data-theme="black">
                         <div class="black"></div>
                         <span>Black</span>
                     </li>
                 </ul>
             </div>
         </div>
     </aside>
     <!-- #END# Right Sidebar -->
 </section>