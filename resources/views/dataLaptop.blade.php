<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Data Laptop</h2>
        <p>Berikut ini merupakan data laptop yang tersedia di database</p>
      </div>

    <table class="table table-striped table-hover table-light table-responsive text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Layar</th>
                <th>Prosesor</th>
                <th>RAM</th>
                <th>Penyimpanan</th>
                <th>Baterai</th>
                <th>Harga/Juta</th>
            </tr>
        </thead>
        <tbody>
            @php $nomor = 1 @endphp
            @foreach($data as $item)
                <tr>
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->layar }}</td>
                    <td>{{ $item->prosesor }}</td>
                    <td>{{ $item->RAM }}</td>
                    <td>{{ $item->penyimpanan }}</td>
                    <td>{{ $item->baterai }}</td>
                    <td>{{ $item->harga }}</td>                                   
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    </div>
  </section>