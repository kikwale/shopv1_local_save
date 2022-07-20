


      @extends('layouts.owner')

      <?php
      App::setLocale(Session::get('locale'));
      ?>
      
      @section('content')
          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div id="htmlContent">
                <h2 style="color: #0094ff">Hello</h2>  
                <h3>About this Code:</h3>  
          <p>Demo of how to convert and Download HTML page to PDF file with CSS, using JavaScript and jQuery.</p>  
          <table>  
            <tbody>  
              <tr>  
                <th>Person</th>  
                <th>Contact</th>  
                <th>Country</th>  
              </tr>  
              <tr>  
                <td>John</td>  
                <td>+2345678910</td>  
                <td>Germany</td>  
              </tr> 
              <tr>  
                <td>Jacob</td>  
                <td>+1234567890</td>  
                <td>Mexico</td>  
              </tr>  
              <tr>  
                <td>Eleven</td>  
                <td>+91234567802</td>  
                <td>Austria</td>  
              </tr>  
            </tbody>  
          </table>    
        </div>
        <div id="editor"></div>
        <center>
          <p>
            <button id="generatePDF">generate PDF</button>
          </p>
        </center>
             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
        
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/cdnjs/jspdf.min.js"></script>
<script src="dist/js/unpkg/jspdf.min.js"></script>
        <script type="text/javascript">
          var doc = new jsPDF();
          var specialElementHandlers = {
              '#editor': function (element, renderer) {
                  return true;
              }
          };
           
           
          $('#generatePDF').click(function () {
              doc.fromHTML($('#htmlContent').html(), 15, 15, {
                  'width': 700,
                  'elementHandlers': specialElementHandlers
              });
              doc.save('sample_file.pdf');
          });
          </script>

      @endsection
      
        