<?= $this->extend('layout/template'); ?>

<?= $this->section('headers'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<?= $this->endSection('headers'); ?>

<?= $this->section('content'); ?>


<section class="content">
    <div class="row">
        <!-- peta -->
        <div class="col-lg-12 col-12">
            <div id="map"></div>
        </div>
    </div>
    <br>
    <br>
    <div class="row d-flex justify-content-center">
        <div class="col-11">
            <section>
                <canvas id="barChart"></canvas>
            </section>

        </div>
    </div>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        var dataKecamatan = <?= json_encode(array_map(function ($key) {
            return [
                'kode_kecamatan' => $key['kode_kecamatan'],
                'nama_kecamatan' => $key['nama_kecamatan'],
                'total_penduduk' => (int) $key['total_penduduk'],
                'total_pria' => (int) $key['total_pria'],
                'total_wanita' => (int) $key['total_wanita'],
                'total_ktp' => (int) $key['total_ktp'],
                'total_perekaman_ktp' => (int) $key['total_perekaman_ktp'],
                'total_akta_perkawinan' => (int) $key['total_akta_perkawinan'],
                'total_akta_perceraian' => (int) $key['total_akta_perceraian'],
                'total_akta_kematian' => (int) $key['total_akta_kematian'],
                'total_kartu_identitas_anak' => (int) $key['total_kartu_identitas_anak'],
                'total_identitas_kependudukan_digital' => (int) $key['total_identitas_kependudukan_digital'],
                'total_akta_kelahiran_0_18' => (int) $key['total_akta_kelahiran_0_18'],
                'total_penduduk_0_18' => (int) $key['total_penduduk_0_18'],
                'total_berstatus_kawin' => (int) $key['total_berstatus_kawin'],
                'total_berstatus_cerai' => (int) $key['total_berstatus_cerai'],
                'total_penduduk_non_permanen' => (int) $key['total_penduduk_non_permanen'],
                'total_pindah' => (int) $key['total_pindah'],
                'total_datang' => (int) $key['total_datang'],
            ];
        }, $data_kecamatan)) ?>;

        var dataDesa = <?= json_encode(array_map(function ($row) {
            return [
                'kode_desa' => $row['kode_desa'],
                'nama_desa' => $row['nama_desa'],
                'total_penduduk' => (int) $row['total_penduduk'],
                'total_pria' => (int) $row['total_pria'],
                'total_wanita' => (int) $row['total_wanita'],
                'total_ktp' => (int) $row['total_ktp'],
                'total_perekaman_ktp' => (int) $row['total_perekaman_ktp'],
                'total_akta_perkawinan' => (int) $row['total_akta_perkawinan'],
                'total_akta_perceraian' => (int) $row['total_akta_perceraian'],
                'total_akta_kematian' => (int) $row['total_akta_kematian'],
                'total_kartu_identitas_anak' => (int) $row['total_kartu_identitas_anak'],
                'total_identitas_kependudukan_digital' => (int) $row['total_identitas_kependudukan_digital'],
                'total_akta_kelahiran_0_18' => (int) $row['total_akta_kelahiran_0_18'],
                'total_penduduk_0_18' => (int) $row['total_penduduk_0_18'],
                'total_berstatus_kawin' => (int) $row['total_berstatus_kawin'],
                'total_berstatus_cerai' => (int) $row['total_berstatus_cerai'],
                'total_penduduk_non_permanen' => (int) $row['total_penduduk_non_permanen'],
                'total_pindah' => (int) $row['total_pindah'],
                'total_datang' => (int) $row['total_datang'],
            ];
        }, $data_desa)) ?>;

        var geojsonBaseUrl = <?= json_encode(base_url('assets/geojson/')) ?>;

        function escapeHtml(str) {
            if (str === null || str === undefined) return '';
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        var geoLayer; // Variabel global untuk lapisan geojson

        // Inisialisasi peta
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: 9,
            maxZoom: 14,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var kecamatan = L.layerGroup();

        //Wilayah Kecamatan
        dataKecamatan.forEach(function(item) {
            $.getJSON(geojsonBaseUrl + item.kode_kecamatan + '.geojson', function(data) {
                geoLayer = L.geoJson(data, {
                    style: function(feature) {
                        return {
                            opacity: 0.8,
                            fillOpacity: 0.2,
                            fillColor: '#3388ff' // warna latar belakang asli
                        }
                    },
                    onEachFeature: onEachFeature, // tambahkan onEachFeature di sini

                }).addTo(kecamatan);
                geoLayer.eachLayer(function(layer) {
                    layer.bindPopup(
                        "<b>KECAMATAN " + escapeHtml(item.nama_kecamatan) + "</b><br>Kabupaten Buleleng<br>" +
                        "Jumlah Penduduk: " + item.total_penduduk + "<br>" +
                        "Jumlah Pria: " + item.total_pria + "<br>" +
                        "Jumlah Wanita: " + item.total_wanita + "<br>" +
                        "Jumlah Wajib KTP: " + item.total_ktp + "<br>" +
                        "Jumlah Perekaman KTP: " + item.total_perekaman_ktp + "<br>" +
                        "Jumlah Akta Perkawinan: " + item.total_akta_perkawinan + "<br>" +
                        "Jumlah Akta Perceraian: " + item.total_akta_perceraian + "<br>" +
                        "Jumlah Akta Kematian: " + item.total_akta_kematian + "<br>" +
                        "Jumlah Kartu Identitas Anak: " + item.total_kartu_identitas_anak + "<br>" +
                        "Jumlah Identitas kependudukan Digital: " + item.total_identitas_kependudukan_digital + "<br>" +
                        "Jumlah Akta Kelahiran Umur 0-18 Tahun: " + item.total_akta_kelahiran_0_18 + "<br>" +
                        "Jumlah Penduduk Umur 0-18 Tahun: " + item.total_penduduk_0_18 + "<br>" +
                        "Jumlah Penduduk berstatus Kawin: " + item.total_berstatus_kawin + "<br>" +
                        "Jumlah Penduduk Berstatus Cerai: " + item.total_berstatus_cerai + "<br>" +
                        "Jumlah Penduduk Non Permanen: " + item.total_penduduk_non_permanen + "<br>" +
                        "Jumlah Pindah: " + item.total_pindah + "<br>" +
                        "Jumlah Datang: " + item.total_datang
                    );
                });
            });
        });

        var desa = L.layerGroup();
        //Wilayah Desa
        dataDesa.forEach(function(item) {
            $.getJSON(geojsonBaseUrl + item.kode_desa + '.geojson', function(data) {
                geoLayer = L.geoJson(data, {
                    style: function(feature) {
                        return {
                            opacity: 0.8,
                            fillOpacity: 0.2,
                            fillColor: '#3388ff' // warna latar belakang asli

                        }
                    },
                    onEachFeature: onEachFeature, // tambahkan onEachFeature di sini

                }).addTo(desa);
                geoLayer.eachLayer(function(layer) {
                    layer.bindPopup(
                        "<b>DESA " + escapeHtml(item.nama_desa) + "</b><br>" +
                        "Jumlah Penduduk: " + item.total_penduduk + "<br>" +
                        "Jumlah Pria: " + item.total_pria + "<br>" +
                        "Jumlah Wanita: " + item.total_wanita + "<br>" +
                        "Jumlah Wajib KTP: " + item.total_ktp + "<br>" +
                        "Jumlah Perekaman KTP: " + item.total_perekaman_ktp + "<br>" +
                        "Jumlah Akta Perkawinan: " + item.total_akta_perkawinan + "<br>" +
                        "Jumlah Akta Perceraian: " + item.total_akta_perceraian + "<br>" +
                        "Jumlah Akta Kematian: " + item.total_akta_kematian + "<br>" +
                        "Jumlah Kartu Identitas Anak: " + item.total_kartu_identitas_anak + "<br>" +
                        "Jumlah Identitas Kependudukan Digital: " + item.total_identitas_kependudukan_digital + "<br>" +
                        "Jumlah Akta Kelahiran Umur 0-18 Tahun: " + item.total_akta_kelahiran_0_18 + "<br>" +
                        "Jumlah Penduduk Umur 0-18 Tahun: " + item.total_penduduk_0_18 + "<br>" +
                        "Jumlah Penduduk berstatus Kawin: " + item.total_berstatus_kawin + "<br>" +
                        "Jumlah Penduduk Berstatus Cerai: " + item.total_berstatus_cerai + "<br>" +
                        "Jumlah Penduduk Non Permanen: " + item.total_penduduk_non_permanen + "<br>" +
                        "Jumlah Pindah: " + item.total_pindah + "<br>" +
                        "Jumlah Datang: " + item.total_datang
                    );
                });
            });
        });

        var map = L.map('map', {
            center: [-8.15437161961216, 114.97341243888704],
            zoom: 10,
            layers: [osm, kecamatan]
        });

        //Layer Control
        var baseMaps = {
            "OpenStreetMap": osm
        };
        var overlayMaps = {
            "Kecamatan": kecamatan,
            "Desa": desa
        };

        //Zoom control layer
        // var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
        var layerControl = L.control.layers(overlayMaps).addTo(map);

        map.on("zoomend", function() {
            var zoomlevel = map.getZoom();
            if (zoomlevel < 12) {
                if (map.hasLayer(desa)) {
                    map.removeLayer(desa);
                    map.addLayer(kecamatan);
                } else {
                    map.addLayer(kecamatan);
                }
            }
            if (zoomlevel >= 12) {
                if (map.hasLayer(kecamatan)) {
                    map.removeLayer(kecamatan);
                    map.addLayer(desa);
                } else {
                    map.addLayer(desa);
                }
            }
            // console.log("Current Zoom Level = " + zoomlevel);
        });

        var allLayers = [];

        // Fungsi untuk menambahkan layer baru ke dalam kumpulan allLayers
        function addLayer(layer) {
            allLayers.push(layer);
        }

        // Fungsi untuk mereset highlight pada semua layer kecuali yang sedang difokuskan
        function resetOtherHighlights(focusedLayer) {
            allLayers.forEach(function(layer) {
                if (layer !== focusedLayer) {
                    resetHighlight({
                        target: layer
                    });
                }
            });
        }

        function highlightFeature(e) {
            var layer = e.target;

            // Ganti warna latar belakang bagian dalam peta menjadi biru
            layer.setStyle({
                fillColor: 'blue', // Ubah warna latar belakang
                fillOpacity: 0.8 // Ubah kecerahan latar belakang
            });

            layer.bringToFront(); // Bawa layer ke depan
        }

        function resetHighlight(e) {
            var layer = e.target;
            // Kembalikan warna latar belakang bagian dalam peta ke warna aslinya
            layer.setStyle({
                fillColor: '#3388ff', // Warna latar belakang asli
                fillOpacity: 0.2 // Kecerahan latar belakang asli
            });
        }

        function onEachFeature(feature, layer) {
            addLayer(layer); // Tambahkan layer ke dalam kumpulan allLayers

            layer.on({
                click: function(e) {
                    highlightFeature(e); // Sorot layer yang diklik
                    resetOtherHighlights(e.target); // Reset highlight layer lainnya
                }
            });
        }

        // Data grafik batang -- diambil langsung dari array dataKecamatan
        // yang sudah di-json_encode dengan aman di atas.
        var data = {
            labels: dataKecamatan.map(function(item) {
                return item.nama_kecamatan;
            }),
            datasets: [{
                    label: 'Jumlah Penduduk',
                    data: dataKecamatan.map(function(item) {
                        return item.total_penduduk;
                    }),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)'
                },
                {
                    label: 'Jumlah Pria',
                    data: dataKecamatan.map(function(item) {
                        return item.total_pria;
                    }),
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)'
                },
                {
                    label: 'Jumlah Wanita',
                    data: dataKecamatan.map(function(item) {
                        return item.total_wanita;
                    }),
                    backgroundColor: 'rgba(255, 205, 86, 0.5)',
                    borderColor: 'rgba(255, 205, 86, 1)'
                },
                {
                    label: 'Jumlah Wajib KTP',
                    data: dataKecamatan.map(function(item) {
                        return item.total_ktp;
                    }),
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)'
                },
                {
                    label: 'Jumlah Perekaman KTP',
                    data: dataKecamatan.map(function(item) {
                        return item.total_perekaman_ktp;
                    }),
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(54, 162, 235, 0.5)'
                },
                {
                    label: 'Jumlah Akta Perkawinan',
                    data: dataKecamatan.map(function(item) {
                        return item.total_akta_perkawinan;
                    }),
                    backgroundColor: 'rgba(255, 205, 86, 1)',
                    borderColor: 'rgba(255, 205, 86, 0.5)'
                },
                {
                    label: 'Jumlah Akta Perceraian',
                    data: dataKecamatan.map(function(item) {
                        return item.total_akta_perceraian;
                    }),
                    backgroundColor: 'rgba(184,134,11,1)',
                    borderColor: 'rgba(255, 0, 0, 0.5)'
                },
                {
                    label: 'Jumlah Akta Kematian',
                    data: dataKecamatan.map(function(item) {
                        return item.total_akta_kematian;
                    }),
                    backgroundColor: 'rgba(255, 0, 0, 1)',
                    borderColor: 'rgba(255, 0, 0, 0.5)'
                },
                {
                    label: 'Jumlah Kartu Identitas Anak',
                    data: dataKecamatan.map(function(item) {
                        return item.total_kartu_identitas_anak;
                    }),
                    backgroundColor: 'rgba(255, 0, 255, 0.5)',
                    borderColor: 'rgba(255, 0, 255, 1)'
                },
                {
                    label: 'Jumlah Identitas Kependudukan Digital',
                    data: dataKecamatan.map(function(item) {
                        return item.total_identitas_kependudukan_digital;
                    }),
                    backgroundColor: 'rgba(0, 255, 255, 0.5)',
                    borderColor: 'rgba(0, 255, 255, 1)'
                },
                {
                    label: 'Jumlah Akta Kelahiran Umur 0-18 Tahun',
                    data: dataKecamatan.map(function(item) {
                        return item.total_akta_kelahiran_0_18;
                    }),
                    backgroundColor: 'rgba(70,130,180, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)'
                },
                {
                    label: 'Jumlah Penduduk Umur 0-18 Tahun',
                    data: dataKecamatan.map(function(item) {
                        return item.total_penduduk_0_18;
                    }),
                    backgroundColor: 'rgba(50,205,50, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)'
                },
                {
                    label: 'Jumlah Penduduk Berstatius Kawin',
                    data: dataKecamatan.map(function(item) {
                        return item.total_berstatus_kawin;
                    }),
                    backgroundColor: 'rgba(255,69,0, 0.5)',
                    borderColor: 'rgba(255, 205, 86, 1)'
                },
                {
                    label: 'Jumlah Penduduk Berstatius Cerai',
                    data: dataKecamatan.map(function(item) {
                        return item.total_berstatus_cerai;
                    }),
                    backgroundColor: 'rgba(224,17,95, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)'
                },
                {
                    label: 'Jumlah Penduduk Non Permanen',
                    data: dataKecamatan.map(function(item) {
                        return item.total_penduduk_non_permanen;
                    }),
                    backgroundColor: 'green',
                    borderColor: 'black'
                },
                {
                    label: 'Jumlah Pindah',
                    data: dataKecamatan.map(function(item) {
                        return item.total_pindah;
                    }),
                    backgroundColor: 'yellow',
                    borderColor: 'black'
                },
                {
                    label: 'Jumlah Datang',
                    data: dataKecamatan.map(function(item) {
                        return item.total_datang;
                    }),
                    backgroundColor: 'purple',
                    borderColor: 'black'
                },
            ]
        };

        // Opsi grafik batang
        var options = {
            //indexAxis: 'y', // Mengubah sumbu x menjadi sumbu y
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true
                }
            }
        };

        // Membuat grafik batang
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar', // Mengubah tipe grafik menjadi horizontalBar
            data: data,
            options: options
        });
    </script>


</section>
<!-- /.content -->
<?= $this->endSection('content'); ?>