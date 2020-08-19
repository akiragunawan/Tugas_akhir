<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<!--<script src="<?php //echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script> -->
<!-- <script src="<?php //echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?php //echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script> -->
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php //echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('assets/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pace-progress/pace.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/sweetalert2/sweetalert2.all.min.js') ?>"></script>


  







<script type="text/javascript">

 

  
const applicationServerPublicKey = 'BJqkHj2Xr0i-smJj3DwRG-lo5bJYXLvaCEhtkO8HzukZS5T9p8JtH2tuIRCTO5qgBBWU8eyXyF4l5JRkHiN92tE';
const pushButton = document.querySelector('.js-push-btn');

let isSubscribed = false;
let swRegistration = null;

function urlB64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

function updateBtn() {
  if (Notification.permission === 'denied') {
    pushButton.textContent = 'Push Messaging Blocked.';
    pushButton.disabled = true;
    updateSubscriptionOnServer(null);
    return;
  }

  if (isSubscribed) {
    pushButton.textContent = 'Disable Push Messaging';
  } else {
    pushButton.textContent = 'Enable Push Messaging';
  }

  pushButton.disabled = false;
}

function updateSubscriptionOnServer(subscription) {
  // TODO: Send subscription to application server

  const subscriptionJson = document.querySelector('.js-subscription-json');
  const subscriptionDetails =
    document.querySelector('.js-subscription-details');

  if (subscription) {
    subscriptionJson.textContent = JSON.stringify(subscription);
    subscriptionDetails.classList.remove('is-invisible');
  } else {
    subscriptionDetails.classList.add('is-invisible');
  }
}

function subscribeUser() {
  const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
  swRegistration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey: applicationServerKey
  })
  .then(function(subscription) {
    console.log('User is subscribed.');

    updateSubscriptionOnServer(subscription);

    isSubscribed = true;

    updateBtn();
  })
  .catch(function(err) {
    console.log('Failed to subscribe the user: ', err);
    updateBtn();
  });
}

function unsubscribeUser() {
  swRegistration.pushManager.getSubscription()
  .then(function(subscription) {
    if (subscription) {
      return subscription.unsubscribe();
    }
  })
  .catch(function(error) {
    console.log('Error unsubscribing', error);
  })
  .then(function() {
    updateSubscriptionOnServer(null);

    console.log('User is unsubscribed.');
    isSubscribed = false;

    updateBtn();
  });
}

function initializeUI() {
  pushButton.addEventListener('click', function() {
    pushButton.disabled = true;
    if (isSubscribed) {
      unsubscribeUser();
    } else {
      subscribeUser();
    }
  });

  // Set the initial subscription value
  swRegistration.pushManager.getSubscription()
  .then(function(subscription) {
    isSubscribed = !(subscription === null);

    updateSubscriptionOnServer(subscription);

    if (isSubscribed) {
      console.log('User IS subscribed.');
    } else {
      console.log('User is NOT subscribed.');
    }

    updateBtn();
  });
}

if ('serviceWorker' in navigator && 'PushManager' in window) {
  console.log('Service Worker and Push is supported');

  navigator.serviceWorker.register('service-worker.js')
  .then(function(swReg) {
    console.log('Service Worker is registered', swReg);

    swRegistration = swReg;
    //initializeUI();
  })
  .catch(function(error) {
    console.error('Service Worker Error', error);
  });
} else {
  console.warn('Push messaging is not supported');
  //pushButton.textContent = 'Push Not Supported';
}

</script>





<script type="text/javascript">
    $(document).ready(function() {

        <?php if ($this->uri->segment(1) == "mahasiswa") { ?>
          window.onload = function() {
            Mahasiswaa();
            program_studi();
            kompetisi();
            pa();
        };
            //show option PA
            function pa() {

                var opsipa = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/showpa') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsipa += '<option selected hidden>Pembimbing Akademik</option>' +
                                '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

                        }

                        $('#pa').html(opsipa);
                        $('#edit_pa').html(opsipa);
                        
                ;
                    }
                });

            }
            //end show option PA

            //show option kompetisi
            function kompetisi() {

                var opsikomp = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/showkomp') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsikomp += '<option selected hidden>Kompetisi</option>' +
                                '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

                        }
                        $('#edit_kompetisi').html(opsikomp);
                        $('#kompetisi').html(opsikomp);


                    }
                });
                return;
            }
            //end show option kompetisi

            //show option program studi
            function program_studi() {

                var opsips = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/showps') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsips += '<option selected hidden>Program Studi</option>' +
                                '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

                        }

                        $('#program_studi').html(opsips);
                        $('#edit_program_studi').html(opsips);


                    }
                });

            }
            //end show option program studi

            // Show Mahasiswa Data
            function Mahasiswaa() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/show_data') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var dataset = [
                                data[i].nim,
                                data[i].nama,
                                data[i].jenis_kelamin,
                                data[i].program_studi,
                                data[i].kompetisi,
                                data[i].pa,
                                data[i].tanggal_masuk,
                                '<button type="button" id ="edit_btn_mahasiswa" class="btn btn-warning btn-circle"><i class="fas fa-file"></i></button>' +
                                '<button type="button" id="delete_mahasiswa" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>'
                            ];

                            // $('#mahasiswa_table').rows.add([dataset]).draw();

                            $('#mahasiswa_table').DataTable().rows.add([dataset]).draw();
                        }
                    }
                });

            }
            // End Show Mahasiswa Data

            //Delete Mahasiswa
            $('#mahasiswa_table').on('click', '#delete_mahasiswa', function() {
                var data = $('#mahasiswa_table').DataTable().row($(this).parents('tr')).data();
                var nim = data[0];
                var nama = data[1];



                var html2 = '';
                html2 = '<div class="text"><h3> Delete ' + nama + '?</h3></div>' +
                    '<input type="text" name="nimm" id="nimm" class="form-control" placeholder="NIM" hidden readonly disabled>';

                $('#delete_mahasiswa_modal_body').html(html2);

                $('#modal_delete_mahasiswa').modal('show');

                $('[name="nimm"]').val(nim);
            });

            $('#btn_delete_mahasiswa').on('click', function() {
                var nimm = $('#nimm').val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/deletemahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        nim: nimm

                    },
                    success: function(data) {




                        $('#mahasiswa_table').DataTable().clear();
                        Mahasiswaa();
                        program_studi();
                        kompetisi();
                        pa();
                        $('#modal_delete_mahasiswa').modal('hide');

                        Swal.fire('Data Deleted');


                    }
                });
                return false;
            });
            //End Delete Mahasiswa


            //edit mahasiswa
            $('#mahasiswa_table').on('click', '#edit_btn_mahasiswa', function() {
                var data = $('#mahasiswa_table').DataTable().row($(this).parents('tr')).data();

                $('#modal_edit_mahasiswa').modal('show');

                $('#edit_nim').val(data[0]);
                $('#edit_nama_mahasiswa').val(data[1]);
                $('[name=edit_jenis_kelamin]').val(data[2]);
                $('[name=edit_program_studi]').val(data[3]);
                $('[name=edit_kompetisi]').val(data[4]);
                $('[name=edit_pa]').val(data[5]);
                $('#edit_tgl').val(data[6]);
            });
            $('#edit_mahasiswa_btn').on('click', function() {
                var nim = $('#edit_nim').val();
                var nama = $('#edit_nama_mahasiswa').val();
                var jk = $('#edit_jenis_kelamin').val();
                var ps = $('#edit_program_studi').val();
                var komp = $('#edit_kompetisi').val();
                var p_a = $('#edit_pa').val();
                var tgl = $('#edit_tgl').val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/updatemahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        nim: nim,
                        nama: nama,
                        jk: jk,
                        ps: ps,
                        kompetisi: komp,
                        pa: p_a,
                        tgl: tgl
                    },
                    success: function(data) {
                        $('#edit_nim').val("");
                        $('#edit_nim').attr('placeholder', "NIM");
                        $('[name=edit_jenis_kelamin]').val("Jenis kelamin");
                        $('#edit_nama_mahasiswa').val("");
                        $('#edit_nama_mahasiswa').attr('placeholder', "Nama Mahasiswa");
                        $('#tgl').val("");


                        $('#mahasiswa_table').DataTable().clear();
                        Mahasiswaa();
                        program_studi();
                        kompetisi();
                        pa();
                        $('#modal_edit_mahasiswa').modal('hide');

                        Swal.fire('Data Updated');


                    }
                });




            })
            //end edit mahasiswa


            //add mahasiswa
            $('#tambah_mahasiswa').on('click', function() {
                var nim = $('#nim').val();
                var nama = $('#nama_mahasiswa').val();
                var jk = $('#jenis_kelamin').val();
                var ps = $('#program_studi').val();
                var komp = $('#kompetisi').val();
                var p_a = $('#pa').val();
                var tgl = $('#tgl').val();


                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/addmahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        nim: nim,
                        nama: nama,
                        jk: jk,
                        ps: ps,
                        kompetisi: komp,
                        pa: p_a,
                        tgl: tgl
                    },
                    success: function(data) {
                        $('#nim').val("");
                        $('#nim').attr('placeholder', "NIM");
                        $('[name=jenis_kelamin]').val("");
                        $('#nama_mahasiswa').val("");
                        $('#nama_mahasiswa').attr('placeholder', "Nama Mahasiswa");
                        $('#tgl').val("");
                        $('#mahasiswa_table').DataTable().clear();

                        Mahasiswaa();
                        program_studi();
                        kompetisi();
                        pa();
                        Swal.fire('Data Added');


                    }
                });
                return false;
            });
            //end add mahasiswa




        <?php } else if ($this->uri->segment(1) == "dosen") { ?>
            var tabless = $('#dosen_table').DataTable({
                "columnDefs": [{
                        "targets": [4],
                        "visible": false,
                        "searchable": false
                    }

                ]
            });


            Dosenn();
            konsentarsi();

            //show option konsentarsi
            function konsentarsi() {

                var opsikons = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/showkons') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsikons += '<option selected hidden>Konsentrasi</option>' +
                                '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

                        }

                        $('#konsentrasii').html(opsikons);
                        $('#edit_konsentrasi').html(opsikons);


                    }
                });
                return;
            }
            //end show option konsentrasi
            // Show Dosen Data
            function Dosenn() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/show_data') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var datasetdosen = [
                                data[i].nik,
                                data[i].nama,
                                data[i].jenis_kelamin,
                                data[i].konsentrasi,
                                data[i].status,

                                '<button type="button" id ="edit_btn_dosen" class="btn btn-warning btn-circle"><i class="fas fa-file"></i></button>' +
                                '<button type="button" id="delete_dosen" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>'
                            ];

                            // $('#mahasiswa_table').rows.add([dataset]).draw();



                            tabless.rows.add([datasetdosen]).draw();

                        }



                    }
                });

            }
            // End Show Dosen Data

            //add Dosen
            $('#tambah_dosen').on('click', function() {
                var nik = $('#nik').val();
                var nama = $('#nama_dosen').val();
                var jk = $('#jenis_kelamin_dosen').val();
                var ks = $('#konsentrasii').val();
                var sts = $('#statuss').val();



                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/adddosen') ?>',
                    dataType: 'JSON',
                    data: {
                        nik: nik,
                        nama: nama,
                        jk: jk,
                        ks: ks,
                        status: sts

                    },
                    success: function(data) {
                        $('#nik').val("");
                        $('#nik').attr('placeholder', "NIK");
                        $('[name=jenis_kelamin_dosen]').val("");
                        $('#nama_dosen').val("");
                        $('#nama_dosen').attr('placeholder', "Nama Dosen");
                        $('[name=statuss]').val("");

                        $('#dosen_table').DataTable().clear();

                        Dosenn();
                        konsentarsi();


                        Swal.fire('Data Added');


                    }
                });
                return false;
            });
            //end add Dosen



            //Delete Dosen
            $('#dosen_table').on('click', '#delete_dosen', function() {
                var data = $('#dosen_table').DataTable().row($(this).parents('tr')).data();
                var nik = data[0];
                var nama = data[1];



                var del_data = '';
                del_data = '<div class="text"><h3> Delete ' + nama + '?</h3></div>' +
                    '<input type="text" name="nikk" id="nikk" class="form-control" placeholder="NIK" hidden readonly disabled>';

                $('#delete_dosen_modal_body').html(del_data);

                $('#modal_delete_dosen').modal('show');

                $('[name="nikk"]').val(nik);
            });

            $('#btn_delete_dosen').on('click', function() {
                var nikk = $('#nikk').val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/deletedosen') ?>',
                    dataType: 'JSON',
                    data: {
                        nik: nikk

                    },
                    success: function(data) {
                        $('#dosen_table').DataTable().clear();

                        Dosenn();
                        konsentarsi();

                        $('#modal_delete_dosen').modal('hide');

                        Swal.fire('Data Deleted');


                    }
                });
                return false;
            });
            //End Delete Dosen


            //edit dosen
            $('#dosen_table').on('click', '#edit_btn_dosen', function() {
                var data = $('#dosen_table').DataTable().row($(this).parents('tr')).data();

                $('#modal_edit_dosen').modal('show');

                $('#edit_nik').val(data[0]);
                $('#edit_nama_dosen').val(data[1]);
                $('[name=edit_jenis_kelamin_dosen]').val(data[2]);
                $('[name=edit_konsentrasi]').val(data[3]);
                $('[name=edit_status]').val(data[4]);

            });
            $('#edit_dosen_btn').on('click', function() {
                var nik = $('#edit_nik').val();
                var nama = $('#edit_nama_dosen').val();
                var jk = $('#edit_jenis_kelamin_dosen').val();
                var ks = $('#edit_konsentrasi').val();
                var stss = $('#edit_status').val();


                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/updatedosen') ?>',
                    dataType: 'JSON',
                    data: {
                        nik: nik,
                        nama: nama,
                        jk: jk,
                        ks: ks,
                        status: stss
                    },
                    success: function(data) {

                        $('#edit_nik').val("");
                        $('#edit_nik').attr('placeholder', "NIK");
                        $('[name=edit_jenis_kelamin_dosen]').val("Jenis kelamin");
                        $('#edit_nama_dosen').val("");
                        $('#edit_nama_dosen').attr('placeholder', "Nama Dosen");
                        $('[name=edit_status]').val("Jenis kelamin");


                        $('#dosen_table').DataTable().clear();
                        Dosenn();
                        konsentarsi();
                        $('#modal_edit_dosen').modal('hide');

                        Swal.fire('Data Updated');


                    }
                });




            })
            //end edit dosen.




        <?php } else if ($this->uri->segment(1) == "ketua_prodi") { ?>




            ketuaprodi();
            // Show Ketua Prodi
            function ketuaprodi() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('ketua_prodi/show_data_ketua_prodi') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var datasetketuaprodi = [
                                data[i].nik,
                                data[i].nama,
                                data[i].jenis_kelamin,
                                data[i].konsentrasi


                            ];

                            // $('#mahasiswa_table').rows.add([dataset]).draw();

                            $('#ketua_prodi_table').DataTable().rows.add([datasetketuaprodi]).draw();
                        }
                    }
                });

            }
            // End Show Ketua Prodi


        <?php } else if ($this->uri->segment(1) == "pa") { ?>
            pa();
            // Show PA
            function pa() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('pa/show_data_pa') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var datasetpa = [
                                data[i].nik,
                                data[i].nama,
                                data[i].jenis_kelamin,
                                data[i].konsentrasi


                            ];

                            // $('#mahasiswa_table').rows.add([dataset]).draw();

                            $('#pa_table').DataTable().rows.add([datasetpa]).draw();
                        }
                    }
                });

            }
            // End Show PA

        <?php } else if ($this->uri->segment(1) == "form_peng_judul") { ?>

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            program_studi();
            konsentarsi();
            dosen_pembimbing();
            //show dosen pembimbing
            function dosen_pembimbing() {
                opsidsn = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/show_data') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsidsn += '<option selected hidden>Calon Dosen Pembimbing</option>' +
                                '<option value="' + data[i].nik + '">' + data[i].nama + '</option>';

                        }

                        $('#dosen_pemb').html(opsidsn);



                    }
                });

            }
            //end show dosen pembimbing

            //show option program studi
            function program_studi() {

                var opsips = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mahasiswa/showps') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsips += '<option selected hidden>Program Studi</option>' +
                                '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

                        }

                        $('#program_studi_pengajuan').html(opsips);



                    }
                });

            }
            //end show option program studi

            //show option konsentarsi
            function konsentarsi() {

                var opsikons = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/showkons') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsikons += '<option selected hidden>Konsentrasi</option>' +
                                '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

                        }

                        $('#konsentrasii_pengajuan').html(opsikons);



                    }
                });
                return;
            }
            //end show option konsentrasi



        <?php } else if ($this->uri->segment(1) == "lihat_judul") { ?>
           

    

            //show dosen pembimbing
            function dosen_pembimbing2() {
                opsidsn = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/show_data') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsidsn += '<option selected hidden>Calon Dosen Pembimbing</option>' +
                                '<option value="' + data[i].nik + '">' + data[i].nama + '</option>';

                        }

                        $('#dosen_pemb2').html(opsidsn);



                    }
                });

            }
            //end show dosen pembimbing

       document.getElementById("judul_tables").style.witdh = "";
        var tablesjudul = $('#judul_tables').DataTable({
                "columnDefs": [{
                        "targets": [0, 9, 10],
                        "visible": false,
                        "searchable": false,
                       
                    }

                ]
            });
             judul();
            // Show Judul non review
            function judul() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('lihat_judul/show_judul') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetjudul = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].ps,
                                data[i].konsentrasi,
                                data[i].hp,
                                data[i].sks,
                                data[i].ipk,
                                data[i].judul,
                                data[i].dns_path,
                                data[i].laporan_path,
                                data[i].tanggal,
                                data[i].nama_dosen,
                                `<div class="btn-group-vertical"><button type="button" target="iframe_a" id ="lihat_dns" class="btn btn-block btn-sm btn-warning"><i class="fas fa-file"></i><p>Lihat DNS</p></button>
                                <button type="button" id="lihat_laporan" class="btn btn-warning btn-block btn-sm" value="Lihat Laporan"><i class="fas fa-file"></i><p>Lihat Laporan</p></button>
                                <button type="button" id="setuju" class="btn btn-success btn-block btn-sm"><i class="fas fa-check"></i><p>Terima/Tolak</p></button></div>`
                            ];
                  
                            tablesjudul.rows.add([datasetjudul]).draw();


                        }
                    }
                });
                
                   

            }
            // End Show  Judul non review


            //Lihat Dns
            $('#judul_tables').on('click', '#lihat_dns', function() {
                var data = $('#judul_tables').DataTable().row($(this).parents('tr')).data();
                var dns_p = data[9];
                console.log(dns_p);

                window.open(dns_p, "_blank");

            });


            //End Lihat DNS


            //Lihat Laporan
            $('#judul_tables').on('click', '#lihat_laporan', function() {
                var data = $('#judul_tables').DataTable().row($(this).parents('tr')).data();
                var laporan_p = data[10];
                console.log(laporan_p);

                window.open(laporan_p, "_blank");

            });


            //End Lihat laporan

            //terima judul
            $('#judul_tables').on('click', '#setuju', function() {
                var data = $('#judul_tables').DataTable().row($(this).parents('tr')).data();
                var nama = data[2];
                var judul = data[9];
                var nim = data[1];
                var id = data[0];
                var terima = false;
                //console.log(laporan_p);
                var isi = '';
                isi = `<p> Terima /Tolak ${judul.toUpperCase().bold()} yang di buat oleh ${nama.bold()}?<p>
                   
                            <button id="btn_tolak" type="button" class="btn btn-secondary btn-danger" >Tolak Judul</button>
                    <button id="btn_acc" name="btn_delete_dosen" type="button" class="btn btn-success">Terima Judul</button>
                        
                            <input type="text" class="form-control nim_judul" name="nim_judul" id="nim_judul" disabled hidden>
                            <input type="text" class="form-control id_judul" name="id_judul" id="id_judul" disabled hidden>
                        <p id = 'question'>Silakan memilih Dosen Pembimbing kedua</p>
                        <div id ='dospem' class="input-group mb-3">
                        <div class="input-group-prepend">
                             <span class="input-group-text" type="">Pembimbing Ke-2</span>
                         </div>
                                                <select class="custom-select" id="dosen_pemb2" name="dosen_pemb2">


                                                </select>


                                            </div>
                                            <div id=id_tolak><span class="input-group-text bg-danger" type="">TOLAK</span></div>

                                            
                    `

                $('#modal_acc_judul').modal('show');
                $('#Terima_judul').html(isi);
                $('#dospem').hide();
                $('#question').hide();
                $('#id_tolak').hide();
                $('[name="nim_judul"]').val(nim);
                $('[name="id_judul"]').val(id);




            });
            $('#modal_acc_judul').on('click', '#btn_acc', function() {
                $('#dospem').show();
                $('#question').show();
                $('#id_tolak').hide();
                dosen_pembimbing2();
                terima = true;

            })
            $('#modal_acc_judul').on('click', '#btn_tolak', function() {
                $('#dospem').hide();
                $('#question').hide();
                $('#id_tolak').show();
                terima = false;

            })


            //End terima judul


            // apply
            $('#apply_modal').on('click', function() {
                var nimm_judul = $('#nim_judul').val();
                var idd_judul = $('#id_judul').val();
                var dospem2 = $('#dosen_pemb2').val();
                console.log(nimm_judul);

                if (terima == false) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('lihat_judul/tolak_judul') ?>',
                        dataType: 'JSON',
                        data: {
                            nim: nimm_judul,
                            id: idd_judul

                        },
                        success: function(data) {
                            $('#judul_table').DataTable().clear();
                            $('#judul_Terima_table').DataTable().clear();
                            $('#judul_tolak_table').DataTable().clear();
                            judul();
                            judul_terima_show();
                            judul_tolak_show();

                            $('#modal_acc_judul').modal('hide');

                            Swal.fire('Judul DiTolak');


                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('lihat_judul/terima_judul') ?>',
                        dataType: 'JSON',
                        data: {
                            nim: nimm_judul,
                            id: idd_judul,
                            dospem: dospem2

                        },
                        success: function(data) {
                            $('#judul_table').DataTable().clear();
                            $('#judul_Terima_table').DataTable().clear();
                            $('#judul_tolak_table').DataTable().clear();
                            judul();
                            judul_terima_show();
                            judul_tolak_show();

                            $('#modal_acc_judul').modal('hide');

                            Swal.fire('Judul Diterima');


                        }
                    });
                    return false;
                }
            });

            // end apply

            var tablesjudultolak = $('#judul_tolak_table').DataTable();
            judul_tolak_show();

            function judul_tolak_show() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('lihat_judul/show_judul_tolak') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var datasetjudultolak = [
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].tanggal_eks
                            ];

                            tablesjudultolak.rows.add([datasetjudultolak]).draw();

                        }
                    }
                });

            }
            var tablesjudulterima = $('#judul_Terima_table').DataTable();
            judul_terima_show();

            function judul_terima_show() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('lihat_judul/show_judul_terima') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var datasetjudulterima = [
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].tanggal_eks
                            ];

                            tablesjudulterima.rows.add([datasetjudulterima]).draw();

                        }
                    }
                });

            }

            var tabelsemuajudul = $('#list_semua_judul').DataTable({
                "columnDefs": [{
                        "targets": [0, 9, 10],
                        "visible": false,
                        "searchable": false
                    }

                ]
            });

            semuajudul();
            // Show Judul non review
            function semuajudul() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('lihat_judul/semua_judul') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            var tabelsemuajudull = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].ps,
                                data[i].konsentrasi,
                                data[i].hp,
                                data[i].sks,
                                data[i].ipk,
                                data[i].judul,
                                data[i].dns_path,
                                data[i].laporan_path,
                                data[i].tanggal,
                                data[i].accept,
                                data[i].dosen1,
                                data[i].dosen2,
                                data[i].tanggal_eks,
                                `<div class="btn-group-vertical"><button type="button" target="iframe_a" id ="lihat_dns" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Lihat DNS</p></button>
                                <button type="button" id="lihat_laporan" class="btn btn-success btn-block btn-sm" value="Lihat Laporan"><i class="fas fa-file"></i><p>Lihat Laporan</p></button>
                                `
                            ];

                            tabelsemuajudul.rows.add([tabelsemuajudull]).draw();


                        }
                    }
                });



            }

            //Lihat Dns
            $('#list_semua_judul').on('click', '#lihat_dns', function() {
                var data = $('#list_semua_judul').DataTable().row($(this).parents('tr')).data();
                var dns_p = data[9];
                console.log(dns_p);

                window.open(dns_p, "_blank");

            });


            //End Lihat DNS


            //Lihat Laporan
            $('#list_semua_judul').on('click', '#lihat_laporan', function() {
                var data = $('#list_semua_judul').DataTable().row($(this).parents('tr')).data();
                var laporan_p = data[10];
                console.log(laporan_p);

                window.open(laporan_p, "_blank");

            });

            // End Show  Judul non review

        
            
        <?php } else if ($this->uri->segment(1) == "bimbingan_proposal") { ?>
        
            var dospemm1;
             var dospemm2;
             
        dospemm();
        
        window.onload = function() {
                
     
       
        $('#v_d1_b1').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_I.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b2').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_II.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b3').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_III.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b4').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_IV.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d2_b1').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_I.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d2_b2').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_II.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d2_b3').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_III.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d2_b4').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_IV.pdf#toolbar=0&navpanes=0&scrollbar=0');
        };
        
   
        
        
        
         // dospem
           
             
          function dospemm(){
                    $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/dos_pem') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                  
                   //console.log(data.dosennik1);
                 //  console.log(data.dosennik2);
                      $('#dospem1').append(data.dosen1nama);
                      $('#dospem2').append(data.dosen2nama);
                        dospemm1 =data.dosennik1;
                        dospemm2 =data.dosennik2;
                        show_chat_d1_b1();
                        show_chat_d1_b2();
                        show_chat_d1_b3();
                        show_chat_d1_b4();
                        show_chat_d2_b1();
                        show_chat_d2_b2();
                        show_chat_d2_b3();
                        show_chat_d2_b4();
                        
                    }
                });
          }
              
             
        // end dospem
        
        
             //upload b1
        $(document).on('change', '#b_upload_b1', function(){
            var name = document.getElementById("b_upload_b1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['pdf']) == -1) 
                 {
                 alert("Invalid Pdf File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("b_upload_b1").files[0]);
             var f = document.getElementById("b_upload_b1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#b_upload_b1').prop('files')[0];
                form_data.append("file", file_data);
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_b1') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
                $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     console.log(data);
                      Swal.fire('bab I terupload!');
                 
                 }
                });
                }
                });
        // end upload b1
        
        
         //upload b2 
        $(document).on('change', '#b_upload_b2', function(){
            var name = document.getElementById("b_upload_b2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['pdf']) == -1) 
                 {
                 alert("Invalid Pdf File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("b_upload_b2").files[0]);
             var f = document.getElementById("b_upload_b2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#b_upload_b2').prop('files')[0];
                form_data.append("file", file_data);
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_b2') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
                //$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     console.log(data);
                      Swal.fire('bab II terupload!');
                 
                 }
                });
                }
                });
        // end upload b2 
        
            //upload b3 
        $(document).on('change', '#b_upload_b3', function(){
            var name = document.getElementById("b_upload_b3").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['pdf']) == -1) 
                 {
                 alert("Invalid Pdf File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("b_upload_b3").files[0]);
             var f = document.getElementById("b_upload_b3").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#b_upload_b3').prop('files')[0];
                form_data.append("file", file_data);
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_b3') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
                //$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     console.log(data);
                      Swal.fire('bab III terupload!');
                     
                 }
                });
                }
                });
        // end upload b3
   
        
             //upload b4
        $(document).on('change', '#b_upload_b4', function(){
            var name = document.getElementById("b_upload_b4").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['pdf']) == -1) 
                 {
                 alert("Invalid Pdf File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("b_upload_b4").files[0]);
             var f = document.getElementById("b_upload_b4").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#b_upload_b4').prop('files')[0];
                form_data.append("file", file_data);
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_b4') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
                $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     console.log(data);
                      Swal.fire('bab IV terupload!');
                 
                 }
                });
                }
                });
        // end upload b4
        
        
     
               
             //image chat d1 b1
           $(document).on('change', '#image_chat_up_b1_d1', function(){
               
            var name = document.getElementById("image_chat_up_b1_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b1_d1").files[0]);
             var f = document.getElementById("image_chat_up_b1_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b1_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d1_b1_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b1();
                 }
                });
                }
                });
            //end image chat d1 b1
            
            
            //image chat d1 b2
            $(document).on('change', '#image_chat_up_b2_d1', function(){
               
            var name = document.getElementById("image_chat_up_b2_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b2_d1").files[0]);
             var f = document.getElementById("image_chat_up_b2_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b2_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d1_b2_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b2();
                 }
                });
                }
                });
            //end image chat d1 b2
            
            //image chat d1 b3
            $(document).on('change', '#image_chat_up_b3_d1', function(){
               
            var name = document.getElementById("image_chat_up_b3_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b3_d1").files[0]);
             var f = document.getElementById("image_chat_up_b3_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b3_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d1_b3_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b3();
                 }
                });
                }
                });
            //end image chat d1 b3
            
            //image chat d1 b4
            $(document).on('change', '#image_chat_up_b4_d1', function(){
               
            var name = document.getElementById("image_chat_up_b4_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b4_d1").files[0]);
             var f = document.getElementById("image_chat_up_b4_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b4_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d1_b4_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b4();
                 }
                });
                }
                });
            //end image chat d1 b4
            
           //image chat d2 b1
           $(document).on('change', '#image_chat_up_b1_d2', function(){
               
            var name = document.getElementById("image_chat_up_b1_d2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b1_d2").files[0]);
             var f = document.getElementById("image_chat_up_b1_d2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b1_d2').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d2_b1_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d2_b1();
                 }
                });
                }
                });
            //end image chat d2 b1
            
            
            //image chat d2 b2
            $(document).on('change', '#image_chat_up_b2_d2', function(){
               
            var name = document.getElementById("image_chat_up_b2_d2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b2_d2").files[0]);
             var f = document.getElementById("image_chat_up_b2_d2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b2_d2').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d2_b2_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d2_b2();
                 }
                });
                }
                });
            //end image chat d2 b2
            
                //image chat d2 b3
            $(document).on('change', '#image_chat_up_b3_d2', function(){
               
            var name = document.getElementById("image_chat_up_b3_d2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b3_d2").files[0]);
             var f = document.getElementById("image_chat_up_b3_d2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b3_d2').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d2_b3_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d2_b3();
                 }
                });
                }
                });
            //end image chat d2 b3
            
              //image chat d2 b4
            $(document).on('change', '#image_chat_up_b4_d2', function(){
               
            var name = document.getElementById("image_chat_up_b4_d2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b4_d2").files[0]);
             var f = document.getElementById("image_chat_up_b4_d2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b4_d2').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_proposal/f_upload_d2_b4_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d2_b4();
                 }
                });
                }
                });
            //end image chat d2 b4
            
            
        

        
     
         function show_chat_d1_b1(){
                 var chtmhs_b1 = '';
                 var bab = 'Bab I';
                 console.log(dospemm1);
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm1
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                       console.log(data[i].sender);
                       console.log(data[i].url);
                    chtmhs_b1 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b1_d1').html(chtmhs_b1);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
            function show_chat_d1_b2(){
                 var chtmhs_b2 = '';
                 var bab = 'Bab II';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm1
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b2_d1').html(chtmhs_b2);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
          function show_chat_d1_b3(){
                 var chtmhs_b3 = '';
                 var bab = 'Bab III';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm1
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b3 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b3_d1').html(chtmhs_b3);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
         function show_chat_d1_b4(){
                 var chtmhs_b4 = '';
                 var bab = 'Bab IV';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm1
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b4 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b4_d1').html(chtmhs_b4);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
           function show_chat_d2_b1(){
                 var chtmhs_b1_d2 = '';
                 var bab = 'Bab I';
                 console.log(dospemm2);
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm2
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                       console.log(data[i].sender);
                       console.log(data[i].url);
                    chtmhs_b1_d2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b1_d2').html(chtmhs_b1_d2);
                   console.log(data);
   
                  
                    
                        
                    }
                });
        }
            function show_chat_d2_b2(){
                 var chtmhs_b2_d2 = '';
                 var bab = 'Bab II';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm2
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b2_d2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b2_d2').html(chtmhs_b2_d2);
                   console.log(data);

                  
                    
                        
                    }
                });
        }
          function show_chat_d2_b3(){
                 var chtmhs_b3_d2 = '';
                 var bab = 'Bab III';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm2
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b3_d2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b3_d2').html(chtmhs_b3_d2);
                   console.log(data);

                  
                    
                        
                    }
                });
        }
         function show_chat_d2_b4(){
                 var chtmhs_b4 = '';
                 var bab = 'Bab IV';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm2
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b4 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b4_d2').html(chtmhs_b4);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
    

             //chat dosen 1 bab 1
             $("#send_chat_d1_b1").click(function() {
                 
                 if($("#msg_chat_data_d1_b1").val() == null || $("#msg_chat_data_d1_b1").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d1_b1").val();
                 var dospem = dospemm1;
                 var bab = 'Bab I'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d1_b1").val('') ;
                        $("#msg_chat_data_d1_b1").attr("placeholder", "Type Message ...");
                        show_chat_d1_b1();
                        
                 }
            });
            //end chat dosen 1 bab 1
            
            
            
            //chat dosen 1 bab 2
             $("#send_chat_d1_b2").click(function() {
                 
                 if($("#msg_chat_data_d1_b2").val() == null || $("#msg_chat_data_d1_b2").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d1_b2").val();
                 var dospem = dospemm1;
                 var bab = 'Bab II'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d1_b2").val('') ;
                        $("#msg_chat_data_d1_b2").attr("placeholder", "Type Message ...");
                        show_chat_d1_b2();
                   
                 }
            });
            //end chat dosen 1 bab 2
            
                
            //chat dosen 1 bab 3
             $("#send_chat_d1_b3").click(function() {
                 
                 if($("#msg_chat_data_d1_b3").val() == null || $("#msg_chat_data_d1_b3").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d1_b3").val();
                 var dospem = dospemm1;
                 var bab = 'Bab III'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d1_b3").val('') ;
                        $("#msg_chat_data_d1_b3").attr("placeholder", "Type Message ...");
                        show_chat_d1_b3();
                   
                 }
            });
            //end chat dosen 1 bab 3
            
                //chat dosen 1 bab 4
             $("#send_chat_d1_b4").click(function() {
                 
                 if($("#msg_chat_data_d1_b4").val() == null || $("#msg_chat_data_d1_b4").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d1_b4").val();
                 var dospem = dospemm1;
                 var bab = 'Bab IV'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d1_b4").val('') ;
                        $("#msg_chat_data_d1_b4").attr("placeholder", "Type Message ...");
                        show_chat_d1_b4();
                   
                 }
            });
            //end chat dosen 1 bab 4
            
                //chat dosen 2 bab 1
             $("#send_chat_d2_b1").click(function() {
                 
                 if($("#msg_chat_data_d2_b1").val() == null || $("#msg_chat_data_d2_b1").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d2_b1").val();
                 var dospem = dospemm2;
                 var bab = 'Bab I'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d2_b1").val('') ;
                        $("#msg_chat_data_d2_b1").attr("placeholder", "Type Message ...");
                        show_chat_d2_b1();
                        
                 }
            });
            //end chat dosen 2 bab 1
            
            
            
            //chat dosen 2 bab 2
             $("#send_chat_d2_b2").click(function() {
                 
                 if($("#msg_chat_data_d2_b2").val() == null || $("#msg_chat_data_d2_b2").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d2_b2").val();
                 var dospem = dospemm2;
                 var bab = 'Bab II'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d2_b2").val('') ;
                        $("#msg_chat_data_d2_b2").attr("placeholder", "Type Message ...");
                        show_chat_d2_b2();
                   
                 }
            });
            //end chat dosen 2 bab 2
            
                
            //chat dosen 2 bab 3
             $("#send_chat_d2_b3").click(function() {
                 
                 if($("#msg_chat_data_d2_b3").val() == null || $("#msg_chat_data_d2_b3").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d2_b3").val();
                 var dospem = dospemm2;
                 var bab = 'Bab III'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d2_b3").val('') ;
                        $("#msg_chat_data_d2_b3").attr("placeholder", "Type Message ...");
                        show_chat_d2_b3();
                   
                 }
            });
            //end chat dosen 2 bab 3
            
                       //chat dosen 2 bab 4
             $("#send_chat_d2_b4").click(function() {
                 
                 if($("#msg_chat_data_d2_b4").val() == null || $("#msg_chat_data_d2_b4").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d2_b4").val();
                 var dospem = dospemm2;
                 var bab = 'Bab IV'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d2_b4").val('') ;
                        $("#msg_chat_data_d2_b4").attr("placeholder", "Type Message ...");
                        show_chat_d2_b4();
                   
                 }
            });
            //end chat dosen 1 bab 4
            
            
            function send_chat(a,b,c){
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('bimbingan_proposal/add_chat') ?>',
                        dataType: 'JSON',
                        data: {
                            msg : a,
                            dospem1 : b,
                            bab : c
                           

                        },
                        success: function(data) {
               
                        }
                    });
                    return false;
            }
            
        <?php } else if ($this->uri->segment(1) == "List_bimbingan_dosen") { ?>
        
        var nimproposal ;
        var namaproposal;
         var tablesjudul = $('#table_list_bimbingan_proposal').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
        list_bimbingan()
        // Show Judul non review
            function list_bimbingan() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/List_bimbingan') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetjudulbimbingan = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].tanggal_eks,
                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_chat_bimbingan_dosen" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Lihat Bimbingan</p></button>
                                <button type="button" id="btn_selesai_bimbingan" class="btn btn-warning btn-block btn-sm" value="Lihat Laporan"><i class="fas fa-file"></i><p>Selesai Bimbingan</p></button>
                                </div>
                                `
                            ];
                  
                    
                          tablesjudul.rows.add([datasetjudulbimbingan]).draw();

                        }
                    }
                });
                
                   

            }
            // End Show  Judul non review
            $('#table_list_bimbingan_proposal').on('click', '#btn_chat_bimbingan_dosen', function() {
                var data = $('#table_list_bimbingan_proposal').DataTable().row($(this).parents('tr')).data();
                
                       
                        window.open("List_bimbingan_dosen/List_bimbingan_dosen_chat/"+data[1],"_blank");
               
                   console.log(nimproposal);
                    
                  

                
    
            });
             $('#table_list_bimbingan_proposal').on('click', '#btn_selesai_bimbingan', function() {
                var data = $('#table_list_bimbingan_proposal').DataTable().row($(this).parents('tr')).data();
                $('#modal_selesai_bimbingan').modal('show');
                
                nimproposal = data[1];
                namaproposal = data[2];
                isi = `
                
                    <button id="btn_acc" name="btn_acc" type="button" class="btn btn-success">Terima Judul</button>
                `
                
                $('#selesai_bimbingan').html(isi);
    
            });
             $('#modal_selesai_bimbingan').on('click', '#btn_acc', function() {
                Swal.fire('Bimbingan Selesai!');
                $('#modal_selesai_bimbingan').modal('hide');
                     $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/add_selesai') ?>',
                    dataType: 'JSON',
                    data:{
                        nim : nimproposal,
                        nama : namaproposal
                        
                    }, 
                 success: function(data) {
                        console.log(data);
                        Swal.fire(data);
                        $('#modal_selesai_bimbingan').modal('hide');
                        
                       

                        
                    }
                });

            })
            
            <?php if ($this->uri->segment(3) != null) {?>
          var nim = <?php echo $this->uri->segment(3); ?>;
            window.onload = function() {
                 
      
       
        $('#v_d1_b1').attr('src','/upload/proposal/<?php echo $this->uri->segment(3); ?>/Bab_I.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b2').attr('src','/upload/proposal/<?php echo $this->uri->segment(3); ?>/Bab_II.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b3').attr('src','/upload/proposal/<?php echo $this->uri->segment(3); ?>/Bab_III.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b4').attr('src','/upload/proposal/<?php echo $this->uri->segment(3); ?>/Bab_IV.pdf#toolbar=0&navpanes=0&scrollbar=0');
      
                        show_chat_d1_b1();
                        show_chat_d1_b2();
                        show_chat_d1_b3();
                        show_chat_d1_b4();
                 
        };
        
        
        
     
        
     
               
             //image chat d1 b1
           $(document).on('change', '#image_chat_up_b1_d1', function(){
               
            var name = document.getElementById("image_chat_up_b1_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b1_d1").files[0]);
             var f = document.getElementById("image_chat_up_b1_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b1_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('List_bimbingan_dosen/f_upload_d1_b1_image/'. $this->uri->segment(3))   ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b1();
                 }
                });
                }
                });
            //end image chat d1 b1
            
            
            //image chat d1 b2
            $(document).on('change', '#image_chat_up_b2_d1', function(){
               
            var name = document.getElementById("image_chat_up_b2_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b2_d1").files[0]);
             var f = document.getElementById("image_chat_up_b2_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b2_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('List_bimbingan_dosen/f_upload_d1_b2_image/'. $this->uri->segment(3)) ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b2();
                 }
                });
                }
                });
            //end image chat d1 b2
            
            //image chat d1 b3
            $(document).on('change', '#image_chat_up_b3_d1', function(){
               
            var name = document.getElementById("image_chat_up_b3_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b3_d1").files[0]);
             var f = document.getElementById("image_chat_up_b3_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b3_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('List_bimbingan_dosen/f_upload_d1_b3_image/'. $this->uri->segment(3)) ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b3();
                 }
                });
                }
                });
            //end image chat d1 b3
            
            //image chat d1 b4
            $(document).on('change', '#image_chat_up_b4_d1', function(){
               
            var name = document.getElementById("image_chat_up_b4_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b4_d1").files[0]);
             var f = document.getElementById("image_chat_up_b4_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b4_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('List_bimbingan_dosen/f_upload_d1_b4_image/'. $this->uri->segment(3)) ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b4();
                 }
                });
                }
                });
            //end image chat d1 b4
            
        
            
        

        
     
         function show_chat_d1_b1(){
                 var chtmhs_b1 = '';
                 var bab = 'Bab I';
                 
                 
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/show_chat_dosen') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        nim : nim
                        
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                       var urldata = String(data[i].url); // just an example
                       
                           urldata =  urldata.replace("./","/"); 
                     
                            
                       console.log(data[i].sender);
                       console.log(data[i].url);
                    chtmhs_b1 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${urldata}" width="40%" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b1_d1').html(chtmhs_b1);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
            function show_chat_d1_b2(){
                 var chtmhs_b2 = '';
                 var bab = 'Bab II';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/show_chat_dosen') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        nim : nim
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                          var urldata = String(data[i].url); // just an example
                       
                           urldata =  urldata.replace("./","/"); 
                    chtmhs_b2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${urldata}" width="40%" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b2_d1').html(chtmhs_b2);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
          function show_chat_d1_b3(){
                 var chtmhs_b3 = '';
                 var bab = 'Bab III';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/show_chat_dosen') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        nim :nim
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                         var urldata = String(data[i].url); // just an example
                       
                           urldata =  urldata.replace("./","/"); 
                    chtmhs_b3 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${urldata}" width="40%" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b3_d1').html(chtmhs_b3);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
         function show_chat_d1_b4(){
                 var chtmhs_b4 = '';
                 var bab = 'Bab IV';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/show_chat_dosen') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        nim :nim
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                               var urldata = String(data[i].url); // just an example
                       
                           urldata =  urldata.replace("./","/"); 
                    chtmhs_b4 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${urldata}" width="40%" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b4_d1').html(chtmhs_b4);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
          
    

             //chat dosen 1 bab 1
             $("#send_chat_d1_b1").click(function() {
                 
                 if($("#msg_chat_data_d1_b1").val() == null || $("#msg_chat_data_d1_b1").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                 
                 
                 var msg_chat =  $("#msg_chat_data_d1_b1").val();
                 
                 var bab = 'Bab I'
                 console.log(msg_chat);
                        send_chat(msg_chat,bab);
                        $("#msg_chat_data_d1_b1").val('') ;
                        $("#msg_chat_data_d1_b1").attr("placeholder", "Type Message ...");
                        show_chat_d1_b1();
                        
                 }
            });
            //end chat dosen 1 bab 1
            
            
            
            //chat dosen 1 bab 2
             $("#send_chat_d1_b2").click(function() {
                 
                 if($("#msg_chat_data_d1_b2").val() == null || $("#msg_chat_data_d1_b2").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                 
                 
                 var msg_chat =  $("#msg_chat_data_d1_b2").val();
                 
                 var bab = 'Bab II'
                 console.log(msg_chat);
                        send_chat(msg_chat,bab);
                        $("#msg_chat_data_d1_b2").val('') ;
                        $("#msg_chat_data_d1_b2").attr("placeholder", "Type Message ...");
                        show_chat_d1_b2();
                   
                 }
            });
            //end chat dosen 1 bab 2
            
                
            //chat dosen 1 bab 3
             $("#send_chat_d1_b3").click(function() {
                 
                 if($("#msg_chat_data_d1_b3").val() == null || $("#msg_chat_data_d1_b3").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                  
                 
                 var msg_chat =  $("#msg_chat_data_d1_b3").val();
             
                 var bab = 'Bab III'
                 console.log(msg_chat);
                        send_chat(msg_chat,bab);
                        $("#msg_chat_data_d1_b3").val('') ;
                        $("#msg_chat_data_d1_b3").attr("placeholder", "Type Message ...");
                        show_chat_d1_b3();
                   
                 }
            });
            //end chat dosen 1 bab 3
            
                //chat dosen 1 bab 4
             $("#send_chat_d1_b4").click(function() {
                 
                 if($("#msg_chat_data_d1_b4").val() == null || $("#msg_chat_data_d1_b4").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
              
                 
                 var msg_chat =  $("#msg_chat_data_d1_b4").val();
               
                 var bab = 'Bab IV'
                 console.log(msg_chat);
                        send_chat(msg_chat,bab);
                        $("#msg_chat_data_d1_b4").val('') ;
                        $("#msg_chat_data_d1_b4").attr("placeholder", "Type Message ...");
                        show_chat_d1_b4();
                   
                 }
            });
            //end chat dosen 1 bab 4
            
             
            
            
            function send_chat(a,c){
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('List_bimbingan_dosen/add_chat') ?>',
                        dataType: 'JSON',
                        data: {
                            msg : a,
                            nim : nim,
                            bab : c
                           

                        },
                        success: function(data) {
               
                        }
                    });
                    return false;
            }
            
            <?php } ?>
        
        <?php } else if ($this->uri->segment(1) == "Ujian_proposal") { ?>
        
        var nim_mahasiswa;
        var nama_mahasiswa;
        var judul_mahasiswa;
        var dosen1_mahasiswa;
        var dosen2_mahasiswa;
        var terima_tolak;
                     var tablesjudulproposal = $('#table_list_proposal_judul').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
                      var tablesjudulproposalterima = $('#table_list_selesai_proposal_terima').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
                      var tablesjudulproposaltolak = $('#table_list_selesai_proposal_tolak').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
        show_siap();
         function show_siap() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Ujian_proposal/show_siap') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetjudulproposal = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2,
                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_pilihpenguji_tanggal" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Pilih Penguji dan Tanggal Ujian</p></button>
                      
                                </div>
                                `
                            ];
                  
                    
                          tablesjudulproposal.rows.add([datasetjudulproposal]).draw();

                        }
                    }
                });
                
                   

            }
            
             var tablesjudulproposalselesai = $('#table_list_selesai_proposal').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
            show_selesai();
              function show_selesai() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Ujian_proposal/show_selesai') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                            var datasetjudulproposalselesai = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2,
                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_selesai_proposal" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Selesaikan Ujian</p></button>
                      
                                </div>
                                `
                            ];
                  
                    
                          tablesjudulproposalselesai.rows.add([datasetjudulproposalselesai]).draw();

                        }
                    }
                });
                
                   

            }
                   $('#table_list_proposal_judul').on('click', '#btn_pilihpenguji_tanggal', function() {
                       var data = $('#table_list_proposal_judul').DataTable().row($(this).parents('tr')).data();
                       nim_mahasiswa = data[1];
                       nama_mahasiswa = data[2];
                       judul_mahasiswa =data[3];
                       dosen1_mahasiswa =data[4];
                       dosen2_mahasiswa = data[5];
                       dosen_pembimbing2();
                       isi = ` <p id = 'question'>Silakan Memilih Penguji</p>
                                 <div id ='dospem1' class="input-group mb-3">
                                     <div class="input-group-prepend">
                                           <span class="input-group-text" type="">Penguji 1</span>
                                     </div>
                                    <select class="custom-select" id="dosen_pemb1" name="dosen_pemb1">


                                      </select>
                                      </div>
                                       <div id ='dospem2' class="input-group mb-3">
                                     <div class="input-group-prepend">
                                           <span class="input-group-text" type="">Penguji 2</span>
                                     </div>
                                    <select class="custom-select" id="dosen_pemb2" name="dosen_pemb2">


                                      </select>
                                      </div>
                                       <div id ='dospem3' class="input-group mb-3">
                                     <div class="input-group-prepend">
                                           <span class="input-group-text" type="">Penguji 3</span>
                                     </div>
                                    <select class="custom-select" id="dosen_pemb3" name="dosen_pemb3">


                                      </select>
                                      </div>
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                             <input type="text" id="datetimepicker21" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                                 <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                  </div>
                                          </div>
                                          </div>
                           `
                     $('#penguji_tanggal').html(isi);
          
               
                    $('#modal_penguji_tanggal').modal('show');
           $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD H:m:s'});
           
        
            })
            
            
             $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD H:m:s'});
              
             $('#table_list_selesai_proposal').on('click', '#btn_selesai_proposal', function() {
                       var data = $('#table_list_selesai_proposal').DataTable().row($(this).parents('tr')).data();
                       nim_mahasiswa = data[1];
                       dosen_pembimbing2();
                       isi2 = ` <p id = 'question'>Terima / Tolak Ujian Proposal</p>
                                 <button type="button" id="btn_terima" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Terima</p></button>
                                 <button type="button" id="btn_tolak" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Tolak</p></button>
                                         
                           `
                     $('#Terima_tolak_seminar_proposal_isi').html(isi2);
          
               
                    $('#Terima_tolak_seminar_proposal').modal('show');
                     
           
        
            })
            
            
              
            $('#Terima_tolak_seminar_proposal').on('click', '#btn_terima', function() {
                terima_tolak = true;
                terima_tolak_fun();
            })
               $('#Terima_tolak_seminar_proposal').on('click', '#btn_tolak', function() {
                terima_tolak = false;
                terima_tolak_fun();
            })
          
            function terima_tolak_fun(){
                
                        $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Ujian_proposal/terima_tolak_con') ?>',
                    dataType: 'JSON',
                    data : {
                        terima : terima_tolak,
                        nim : nim_mahasiswa
                    },

                    success: function(data) {
                        console.log(data);
                        $('#Terima_tolak_seminar_proposal').modal('hide');
                        Swal.fire('Keputusan di Letakkan');

        


                    }
                });
                
            }
            
            $('#modal_penguji_tanggal').on('click', '#selesai_terima_penguji', function() {
                 var penguji1 = $('#dosen_pemb1').val();
                 var penguji2 = $('#dosen_pemb2').val();
                 var penguji3 = $('#dosen_pemb3').val();
                 
             
                 var tggal =  $('#datetimepicker21').val();
                  $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Ujian_proposal/insert_data_penguji') ?>',
                    dataType: 'JSON',
                    data : {
                        nim : nim_mahasiswa,
                        penguji1 : penguji1,
                        penguji2 : penguji2,
                        penguji3 : penguji3,
                        tanggal : tggal
                        
                    },
                
                    success: function(data) {
                        console.log(data);
                $('#modal_penguji_tanggal').modal('hide');
                  Swal.fire('Ujian sudah DI terakan!');
                    }
                });
                
                
                
            })
            
              function dosen_pembimbing2() {
                opsidsn = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/show_data') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsidsn += '<option selected hidden>Calon Dosen Pembimbing</option>' +
                                '<option value="' + data[i].nik + '">' + data[i].nama + '</option>';

                        }
                        
                        

                        $('#dosen_pemb1').html(opsidsn);
                         $('#dosen_pemb2').html(opsidsn);
                          $('#dosen_pemb3').html(opsidsn);



                    }
                });

            }
            show_selesai_terima();
                 function show_selesai_terima() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Ujian_proposal/show_selesai_terima') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                            var datasetjudulproposalselesaiterima = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2
                
                            ];
                  
                    
                          tablesjudulproposalterima.rows.add([datasetjudulproposalselesaiterima]).draw();

                        }
                    }
                });
                
                   

            }
             show_selesai_tolak();
                 function show_selesai_tolak() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Ujian_proposal/show_selesai_tolak') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                            var datasetjudulproposalselesaitolak = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2
                
                            ];
                  
                    
                          tablesjudulproposaltolak.rows.add([datasetjudulproposalselesaitolak]).draw();

                        }
                    }
                });
                
                   

            }
        
        <?php } else if ($this->uri->segment(1) == "List_ujian_proposal") {  ?>
          var tableujianproposal = $('#table_list_ujian_proposal').DataTable({
                "columnDefs": [{
                        "targets": [0,7],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
            
            list_ujian_proposal()
             function list_ujian_proposal() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_ujian_proposal/list_ujian') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetujianproposal = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2,
                                data[i].tanggal_ujian,
                                data[i].proposal_path,
                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_lihat_proposal" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Lihat Proposal</p></button>
                              
                                </div>
                                `
                            ];
                  
                    
                          tableujianproposal.rows.add([datasetujianproposal]).draw();

                        }
                    }
                });
                
                   

            }
            
            
             $('#table_list_ujian_proposal').on('click', '#btn_lihat_proposal', function() {
                var data = $('#table_list_ujian_proposal').DataTable().row($(this).parents('tr')).data();
                
                       
                        window.open(data[7],"_blank");
               
                   console.log(nimproposal);
                    
                  

                
    
            });
        <?php } else if ($this->uri->segment(1) == "List_ujian_skripsi") {  ?>
          var tableujianskripsi = $('#table_list_ujian_skripsi').DataTable({
                "columnDefs": [{
                        "targets": [0,7],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
            
            list_ujian_skripsi()
             function list_ujian_skripsi() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_ujian_skripsi/list_ujian') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetujianproposal = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2,
                                data[i].tanggal_ujian,
                                data[i].skripsi_path,
                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_lihat_skripsi" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Lihat Proposal</p></button>
                              
                                </div>
                                `
                            ];
                  
                    
                          tableujianskripsi.rows.add([datasetujianproposal]).draw();

                        }
                    }
                });
                
                   

            }
            
            
             $('#table_list_ujian_skripsi').on('click', '#btn_lihat_skripsi', function() {
                var data = $('#table_list_ujian_skripsi').DataTable().row($(this).parents('tr')).data();
                
                       
                        window.open(data[7],"_blank");
               
                   
                    
                  

                
    
            });
        
        <?php } else if ($this->uri->segment(1) == "Lihat_skripsi") { ?>
           var nim_mahasiswa;
        var nama_mahasiswa;
        var judul_mahasiswa;
        var dosen1_mahasiswa;
        var dosen2_mahasiswa;
        var terima_tolak;
        
        
               var tablesjudulproposalterima = $('#table_list_selesai_skripsi_terima').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
                      var tablesjudulproposaltolak = $('#table_list_selesai_skripsi_tolak').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
        
        


        var tableskripsi = $('#table_list_skripsi_judul').DataTable();
             judul();
            // Show Judul non review
            function judul() {

                var html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_skripsi/show_judul_skripsi') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetskripsi = [
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                `<div class="btn-group-vertical">
                                 <button type="button" id ="Tanggal_ujian_skripsi" class="btn btn-block btn-sm btn-warning"><i class="fas fa-file"></i><p>Pilih Tanggal ujian Skripsi</p></button>
                                 </div>`
                            ];
                  
                            tableskripsi.rows.add([datasetskripsi]).draw();


                        }
                    }
                });
                
                   

            }
            // End Show  Judul non review

        function dosen_pembimbing2() {
                opsidsn = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dosen/show_data') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {

                            opsidsn += '<option selected hidden>Calon Dosen Pembimbing</option>' +
                                '<option value="' + data[i].nik + '">' + data[i].nama + '</option>';

                        }
                        
                        

                        $('#dosen_pemb1').html(opsidsn);
                         $('#dosen_pemb2').html(opsidsn);
                          $('#dosen_pemb3').html(opsidsn);



                    }
                });

            }

            $('#table_list_skripsi_judul').on('click', '#Tanggal_ujian_skripsi', function() {
                var data = $('#table_list_skripsi_judul').DataTable().row($(this).parents('tr')).data();
                
                
              nim_mahasiswa = data[0];
                       nama_mahasiswa = data[1];
                       judul_mahasiswa =data[2];
                   
                       dosen_pembimbing2();
                       isi = ` <p id = 'question'>Silakan Memilih Penguji</p>
                                 <div id ='dospem1' class="input-group mb-3">
                                     <div class="input-group-prepend">
                                           <span class="input-group-text" type="">Penguji 1</span>
                                     </div>
                                    <select class="custom-select" id="dosen_pemb1" name="dosen_pemb1">


                                      </select>
                                      </div>
                                       <div id ='dospem2' class="input-group mb-3">
                                     <div class="input-group-prepend">
                                           <span class="input-group-text" type="">Penguji 2</span>
                                     </div>
                                    <select class="custom-select" id="dosen_pemb2" name="dosen_pemb2">


                                      </select>
                                      </div>
                                       <div id ='dospem3' class="input-group mb-3">
                                     <div class="input-group-prepend">
                                           <span class="input-group-text" type="">Penguji 3</span>
                                     </div>
                                    <select class="custom-select" id="dosen_pemb3" name="dosen_pemb3">


                                      </select>
                                      </div>
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                             <input type="text" id="datetimepicker21" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                                 <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                  </div>
                                          </div>
                                          </div>
                           `
                     $('#penguji_tanggal').html(isi);
          
               
                    $('#modal_penguji_tanggal').modal('show');
           
            
            $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD H:m:s'});
            

            });

            $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD H:m:s'});
            
               $('#modal_penguji_tanggal').on('click', '#selesai_terima_penguji', function() {
                 var penguji1 = $('#dosen_pemb1').val();
                 var penguji2 = $('#dosen_pemb2').val();
                 var penguji3 = $('#dosen_pemb3').val();
                 console.log(penguji1);
                 console.log(nim_mahasiswa);
                 
             
                 var tggal =  $('#datetimepicker21').val();
                  $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_skripsi/insert_data_penguji') ?>',
                    dataType: 'JSON',
                    data : {
                        nim : nim_mahasiswa,
                        penguji1 : penguji1,
                        penguji2 : penguji2,
                        penguji3 : penguji3,
                        tanggal : tggal
                        
                    },
                
                    success: function(data) {
                        console.log(data);
                $('#modal_penguji_tanggal').modal('hide');
                  Swal.fire('Ujian sudah DI terakan!');
                    }
                });
                
                
                
            })
                  var tablesjudulskripsiselesai = $('#table_list_selesai_skripsi').DataTable();
            show_selesai();
      function show_selesai() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_skripsi/show_selesai') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                            var datasetjudulskripsilselesai = [
          
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,

                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_selesai_skripsi" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Selesaikan Ujian Skripsi</p></button>
                      
                                </div>
                                `
                            ];
                  
                    
                          tablesjudulskripsiselesai.rows.add([datasetjudulskripsilselesai]).draw();

                        }
                    }
                });
                
                   

            }
            
              $('#table_list_selesai_skripsi').on('click', '#btn_selesai_skripsi', function() {
                       var data = $('#table_list_selesai_skripsi').DataTable().row($(this).parents('tr')).data();
                       nim_mahasiswa = data[0];
                       dosen_pembimbing2();
                       isi2 = ` <p id = 'question'>Terima / Tolak Ujian Proposal</p>
                                 <button type="button" id="btn_terima" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Terima</p></button>
                                 <button type="button" id="btn_tolak" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Tolak</p></button>
                                         
                           `
                     $('#Terima_tolak_seminar_proposal_isi').html(isi2);
          
               
                    $('#Terima_tolak_seminar_proposal').modal('show');
                     
           
        
            })
            
            
              
            $('#Terima_tolak_seminar_proposal').on('click', '#btn_terima', function() {
                terima_tolak = true;
                terima_tolak_fun();
            })
               $('#Terima_tolak_seminar_proposal').on('click', '#btn_tolak', function() {
                terima_tolak = false;
                terima_tolak_fun();
            })
          
            function terima_tolak_fun(){
                
                        $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_skripsi/terima_tolak_con') ?>',
                    dataType: 'JSON',
                    data : {
                        terima : terima_tolak,
                        nim : nim_mahasiswa
                    },

                    success: function(data) {
                        console.log(data);
                        $('#Terima_tolak_seminar_proposal').modal('hide');
                        Swal.fire('Keputusan di Letakkan');

        


                    }
                });
                
            }
            
             show_selesai_terima();
                 function show_selesai_terima() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_skripsi/show_selesai_terima') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                            var datasetjudulproposalselesaiterima = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2
                
                            ];
                  
                    
                          tablesjudulproposalterima.rows.add([datasetjudulproposalselesaiterima]).draw();

                        }
                    }
                });
                
                   

            }
             show_selesai_tolak();
                 function show_selesai_tolak() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_skripsi/show_selesai_tolak') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                            var datasetjudulproposalselesaitolak = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].dosen1,
                                data[i].dosen2
                
                            ];
                  
                    
                          tablesjudulproposaltolak.rows.add([datasetjudulproposalselesaitolak]).draw();

                        }
                    }
                });
                
                   

            }
           
        
        <?php } else if ($this->uri->segment(1) == "Lihat_bimbingan_skripsi_dosen") { ?>
        
          var tablesjudulbimbinganskripsidosen = $('#table_list_bimbingan_skripsi_dosen').DataTable({
                "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false,
                        responsive : true
                    }

                ]
            });
        list_bimbingan()
        // Show Judul non review
            function list_bimbingan() {

         
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_bimbingan_skripsi_dosen/List_bimbingan') ?>',
                    dataType: 'JSON',
                
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                   
                          
                            
                
                            
                            var datasetjudulbimbinganskripsidosen = [
                                data[i].id,
                                data[i].nim,
                                data[i].nama,
                                data[i].judul,
                                data[i].tanggal_eks,
                                `<div class="btn-group-vertical">
                                <button type="button" id="btn_chat_bimbingan_skripsi_dosen" class="btn btn-block btn-sm btn-success"><i class="fas fa-file"></i><p>Lihat Bimbingan</p></button>
                                <button type="button" id="btn_selesai_bimbingan_skripsi" class="btn btn-warning btn-block btn-sm" value="Lihat Laporan"><i class="fas fa-file"></i><p>Selesai Bimbingan</p></button>
                                </div>
                                `
                            ];
                  
                    
                          tablesjudulbimbinganskripsidosen.rows.add([datasetjudulbimbinganskripsidosen]).draw();

                        }
                    }
                });
                
                   

            }
            
             $('#table_list_bimbingan_skripsi_dosen').on('click', '#btn_chat_bimbingan_skripsi_dosen', function() {
                var data = $('#table_list_bimbingan_skripsi_dosen').DataTable().row($(this).parents('tr')).data();
                
                       
                        window.open("Lihat_bimbingan_skripsi_dosen/List_bimbingan_skripsi_dosen_chat/"+data[1],"_blank");
               
                   
                    
                  

                
    
            });
             $('#table_list_bimbingan_skripsi_dosen').on('click', '#btn_selesai_bimbingan_skripsi', function() {
                var data = $('#table_list_bimbingan_skripsi_dosen').DataTable().row($(this).parents('tr')).data();
                $('#modal_selesai_bimbingan_skripsi').modal('show');
                
                nimproposal = data[1];
                namaproposal = data[2];
                isi = `
                
                    <button id="btn_acc" name="btn_acc" type="button" class="btn btn-success">Terima Judul</button>
                `
                
                $('#selesai_bimbingan_skripsi').html(isi);
    
            });
            
                   $('#modal_selesai_bimbingan_skripsi').on('click', '#btn_acc', function() {
                       console.log(nimproposal);
                Swal.fire('Bimbingan Selesai!');
                $('#modal_selesai_bimbingan').modal('hide');
                     $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Lihat_bimbingan_skripsi_dosen/add_selesai') ?>',
                    dataType: 'JSON',
                    data:{
                        nim : nimproposal,
                        nama : namaproposal
                        
                    }, 
                 success: function(data) {
                        console.log(data);
                        Swal.fire('Bimbingan Selesai');
                        $('#modal_selesai_bimbingan').modal('hide');
                        
                       

                        
                    }
                });

            })
            
            <?php if ($this->uri->segment(3) != null) {?>
          var nim = <?php echo $this->uri->segment(3); ?>;
            window.onload = function() {
                 
      
       
        $('#v_d1_b1').attr('src','/upload/proposal/<?php echo $this->uri->segment(3); ?>/Bab_V.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b2').attr('src','/upload/proposal/<?php echo $this->uri->segment(3); ?>/Bab_VI.pdf#toolbar=0&navpanes=0&scrollbar=0');

      
                        show_chat_d1_b1();
                        show_chat_d1_b2();
         
                 
        };
        
        
        
     
        
     
               
             //image chat d1 b5
           $(document).on('change', '#image_chat_up_b1_d1', function(){
               
            var name = document.getElementById("image_chat_up_b1_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b1_d1").files[0]);
             var f = document.getElementById("image_chat_up_b1_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b1_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('List_bimbingan_dosen/f_upload_d1_b5_image/'. $this->uri->segment(3))   ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b1();
                 }
                });
                }
                });
            //end image chat d1 b5
            
            
            //image chat d1 b6
            $(document).on('change', '#image_chat_up_b2_d1', function(){
               
            var name = document.getElementById("image_chat_up_b2_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b2_d1").files[0]);
             var f = document.getElementById("image_chat_up_b2_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b2_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('List_bimbingan_dosen/f_upload_d1_b6_image/'. $this->uri->segment(3)) ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b2();
                 }
                });
                }
                });
            //end image chat d1 b6
      
            
        

        
     
         function show_chat_d1_b1(){
                 var chtmhs_b1 = '';
                 var bab = 'Bab V';
                 
                 
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/show_chat_dosen') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        nim : nim
                        
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                       var urldata = String(data[i].url); // just an example
                       
                           urldata =  urldata.replace("./","/"); 
                     
                            
                       console.log(data[i].sender);
                       console.log(data[i].url);
                    chtmhs_b1 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${urldata}" width="40%" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b1_d1').html(chtmhs_b1);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
            function show_chat_d1_b2(){
                 var chtmhs_b2 = '';
                 var bab = 'Bab VI';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('List_bimbingan_dosen/show_chat_dosen') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        nim : nim
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                          var urldata = String(data[i].url); // just an example
                       
                           urldata =  urldata.replace("./","/"); 
                    chtmhs_b2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${urldata}" width="40%" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b2_d1').html(chtmhs_b2);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }

          
    

             //chat dosen 1 bab 5
             $("#send_chat_d1_b1").click(function() {
                 
                 if($("#msg_chat_data_d1_b1").val() == null || $("#msg_chat_data_d1_b1").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                 
                 
                 var msg_chat =  $("#msg_chat_data_d1_b1").val();
                 
                 var bab = 'Bab V'
                 console.log(msg_chat);
                        send_chat(msg_chat,bab);
                        $("#msg_chat_data_d1_b1").val('') ;
                        $("#msg_chat_data_d1_b1").attr("placeholder", "Type Message ...");
                        show_chat_d1_b1();
                        
                 }
            });
            //end chat dosen 1 bab 5
            
            
            
            //chat dosen 1 bab 6
             $("#send_chat_d1_b2").click(function() {
                 
                 if($("#msg_chat_data_d1_b2").val() == null || $("#msg_chat_data_d1_b2").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                 
                 
                 var msg_chat =  $("#msg_chat_data_d1_b2").val();
                 
                 var bab = 'Bab VI'
                 console.log(msg_chat);
                        send_chat(msg_chat,bab);
                        $("#msg_chat_data_d1_b2").val('') ;
                        $("#msg_chat_data_d1_b2").attr("placeholder", "Type Message ...");
                        show_chat_d1_b2();
                   
                 }
            });
            //end chat dosen 1 bab 6
            
                
   
            
             
            
            
            function send_chat(a,c){
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('List_bimbingan_dosen/add_chat') ?>',
                        dataType: 'JSON',
                        data: {
                            msg : a,
                            nim : nim,
                            bab : c
                           

                        },
                        success: function(data) {
               
                        }
                    });
                    return false;
            }
            
            <?php } ?>
        <?php } else if ($this->uri->segment(1) == "bimbingan_skripsi") { ?>
         var dospemm1;
             var dospemm2;
             
       
        
        window.onload = function() {
                 dospemm();
     
       
        $('#v_d1_b1').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_V.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d1_b2').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_VI.pdf#toolbar=0&navpanes=0&scrollbar=0');

        $('#v_d2_b1').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_V.pdf#toolbar=0&navpanes=0&scrollbar=0');
        $('#v_d2_b2').attr('src','./upload/proposal/<?php echo $this->session->userdata('username'); ?>/Bab_VI.pdf#toolbar=0&navpanes=0&scrollbar=0');

        };
        
   
        
        
        
         // dospem
           
             
          function dospemm(){
                    $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/dos_pem') ?>',
                    dataType: 'JSON',

                    success: function(data) {
                  
                   console.log(data.dosennik1);
                   console.log(data.dosennik2);
                      $('#dospem1').append(data.dosen1nama);
                      $('#dospem2').append(data.dosen2nama);
                        dospemm1 =data.dosennik1;
                        dospemm2 =data.dosennik2;
                        show_chat_d1_b1();
                        show_chat_d1_b2();
               
                        show_chat_d2_b1();
                        show_chat_d2_b2();
                 
                        
                    }
                });
          }
              
             
        // end dospem
        
        
             //upload b1
        $(document).on('change', '#b_upload_b5', function(){
            var name = document.getElementById("b_upload_b5").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['pdf']) == -1) 
                 {
                 alert("Invalid Pdf File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("b_upload_b5").files[0]);
             var f = document.getElementById("b_upload_b5").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#b_upload_b5').prop('files')[0];
                form_data.append("file", file_data);
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_skripsi/f_upload_b5') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
                $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     console.log(data);
                      Swal.fire('bab V terupload!');
                 
                 }
                });
                }
                });
        // end upload b1
        
        
         //upload b2 
        $(document).on('change', '#b_upload_b6', function(){
            var name = document.getElementById("b_upload_b6").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['pdf']) == -1) 
                 {
                 alert("Invalid Pdf File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("b_upload_b6").files[0]);
             var f = document.getElementById("b_upload_b6").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#b_upload_b6').prop('files')[0];
                form_data.append("file", file_data);
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_skripsi/f_upload_b6') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
                //$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     console.log(data);
                      Swal.fire('bab VI terupload!');
                 
                 }
                });
                }
                });
        // end upload b2 
        
  
        
        
     
               
             //image chat d1 b1
           $(document).on('change', '#image_chat_up_b1_d1', function(){
               
            var name = document.getElementById("image_chat_up_b1_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b1_d1").files[0]);
             var f = document.getElementById("image_chat_up_b1_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b1_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_skripsi/f_upload_d1_b5_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b1();
                 }
                });
                }
                });
            //end image chat d1 b1
            
            
            //image chat d1 b2
            $(document).on('change', '#image_chat_up_b2_d1', function(){
               
            var name = document.getElementById("image_chat_up_b2_d1").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b2_d1").files[0]);
             var f = document.getElementById("image_chat_up_b2_d1").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b2_d1').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_skripsi/f_upload_d1_b6_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d1_b2();
                 }
                });
                }
                });
            //end image chat d1 b2
            

            
           //image chat d2 b1
           $(document).on('change', '#image_chat_up_b1_d2', function(){
               
            var name = document.getElementById("image_chat_up_b1_d2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b1_d2").files[0]);
             var f = document.getElementById("image_chat_up_b1_d2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b1_d2').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_skripsi/f_upload_d2_b5_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d2_b1();
                 }
                });
                }
                });
            //end image chat d2 b1
            
            
            //image chat d2 b2
            $(document).on('change', '#image_chat_up_b2_d2', function(){
               
            var name = document.getElementById("image_chat_up_b2_d2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                 {
                 alert("Invalid Image File");
                 }
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("image_chat_up_b2_d2").files[0]);
             var f = document.getElementById("image_chat_up_b2_d2").files[0];

             var fsize = f.size||f.fileSize;
                if(fsize > 2000000)
                 {
                    alert("Image File Size is very big");
                 }
                else
                {
                var file_data = $('#image_chat_up_b2_d2').prop('files')[0];
             
                form_data.append("file", file_data);
              
                
                   
                 $.ajax({
                 url:"<?php echo base_url('bimbingan_skripsi/f_upload_d2_b6_image') ?>",
                 method:"POST",
                 data: form_data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend:function(){
              //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                 },   
                 success:function(data)
                 {
                     
                     
                 
                     console.log(data);
                      Swal.fire('Chat Terupload');
                        show_chat_d2_b2();
                 }
                });
                }
                });
            //end image chat d2 b2
            
        
            
        

        
     
         function show_chat_d1_b1(){
                 var chtmhs_b1 = '';
                 var bab = 'Bab V';
                 console.log(dospemm1);
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm1
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                       console.log(data[i].sender);
                       console.log(data[i].url);
                    chtmhs_b1 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images" > ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b1_d1').html(chtmhs_b1);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
            function show_chat_d1_b2(){
                 var chtmhs_b2 = '';
                 var bab = 'Bab VI';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm1
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b2_d1').html(chtmhs_b2);
                   console.log(data);
                  // console.log(data.dosen2nama);
                     // $('#dospem1').append(data.dosen1nama);
                  
                    
                        
                    }
                });
        }
      
           function show_chat_d2_b1(){
                 var chtmhs_b1_d2 = '';
                 var bab = 'Bab V';
                 console.log(dospemm2);
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm2
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                       console.log(data[i].sender);
                       console.log(data[i].url);
                    chtmhs_b1_d2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b1_d2').html(chtmhs_b1_d2);
                   console.log(data);
   
                  
                    
                        
                    }
                });
        }
            function show_chat_d2_b2(){
                 var chtmhs_b2_d2 = '';
                 var bab = 'Bab VI';
                      $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('bimbingan_proposal/show_chat_mahasiswa') ?>',
                    dataType: 'JSON',
                    data: {
                        bab : bab,
                        dospem :dospemm2
                    },

                    success: function(data) {
                        
                   for (var i = 0; i < data.length; i++) {
                     
                    chtmhs_b2_d2 += ` 
                                <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">${data[i].nama}</span>
                                     <span class="direct-chat-timestamp float-right">${data[i].date}</span>
                                 </div>
                                ${data[i].url ? 
                                `<img src ="${data[i].url}" width="40%" alt="Chat Images"> ` : 
                                `
                                                               
                                 <div class="direct-chat-text">
                                 
                                     ${data[i].msg}
                                 </div>
                                                              
                                </div>`}`
                       
                     
                                                          

                                                          
                            
                                                    
                       
                   }
                   $('#mahasiswa_chat_b2_d2').html(chtmhs_b2_d2);
                   console.log(data);

                  
                    
                        
                    }
                });
        }
       
    

             //chat dosen 1 bab 1
             $("#send_chat_d1_b1").click(function() {
                 
                 if($("#msg_chat_data_d1_b1").val() == null || $("#msg_chat_data_d1_b1").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d1_b1").val();
                 var dospem = dospemm1;
                 var bab = 'Bab V'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d1_b1").val('') ;
                        $("#msg_chat_data_d1_b1").attr("placeholder", "Type Message ...");
                        show_chat_d1_b1();
                        
                 }
            });
            //end chat dosen 1 bab 1
            
            
            
            //chat dosen 1 bab 2
             $("#send_chat_d1_b2").click(function() {
                 
                 if($("#msg_chat_data_d1_b2").val() == null || $("#msg_chat_data_d1_b2").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d1_b2").val();
                 var dospem = dospemm1;
                 var bab = 'Bab VI'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d1_b2").val('') ;
                        $("#msg_chat_data_d1_b2").attr("placeholder", "Type Message ...");
                        show_chat_d1_b2();
                   
                 }
            });
            //end chat dosen 1 bab 2
            
                
  
                //chat dosen 2 bab 1
             $("#send_chat_d2_b1").click(function() {
                 
                 if($("#msg_chat_data_d2_b1").val() == null || $("#msg_chat_data_d2_b1").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d2_b1").val();
                 var dospem = dospemm2;
                 var bab = 'Bab V'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d2_b1").val('') ;
                        $("#msg_chat_data_d2_b1").attr("placeholder", "Type Message ...");
                        show_chat_d2_b1();
                        
                 }
            });
            //end chat dosen 2 bab 1
            
            
            
            //chat dosen 2 bab 2
             $("#send_chat_d2_b2").click(function() {
                 
                 if($("#msg_chat_data_d2_b2").val() == null || $("#msg_chat_data_d2_b2").val() == ""){
                     alert('Message Cannot Be Empty');
                 }else{
                     console.log(dospemm1);
                 
                 var msg_chat =  $("#msg_chat_data_d2_b2").val();
                 var dospem = dospemm2;
                 var bab = 'Bab VI'
                 console.log(msg_chat);
                        send_chat(msg_chat,dospem,bab);
                        $("#msg_chat_data_d2_b2").val('') ;
                        $("#msg_chat_data_d2_b2").attr("placeholder", "Type Message ...");
                        show_chat_d2_b2();
                   
                 }
            });
            //end chat dosen 2 bab 2
            
   
            
            
            function send_chat(a,b,c){
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('bimbingan_proposal/add_chat') ?>',
                        dataType: 'JSON',
                        data: {
                            msg : a,
                            dospem1 : b,
                            bab : c
                           

                        },
                        success: function(data) {
               
                        }
                    });
                    return false;
            }
            
        
        <?php } ?>
         























    });
</script>