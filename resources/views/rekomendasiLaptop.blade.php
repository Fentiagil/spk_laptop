<section id="rekomen" class="rekomen">

    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Rekomendasi Laptop</h2>
      </div>

      <div class="row content">
        <table class="table table-striped table-hover table-light table-responsive text-center">
            <thead>
                <tr>
                    <th>Peringkat</th>
                    <th>Data Laptop</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $key => $result)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $result->nama }}</td>
                        <td>{{ $result->nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
      </div>

    </div>
</section>
