jQuery(document).ready(function($) {

        let tableData = `
            <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock status</th>
                <th>Stock quantity</th>
            </tr>
            </thead>
            <tbody id="res"></tbody>
        </table>`

        createSearchProduct();
        pagination();
    
    
// list products
        $('#btnProducts').click(function() {
            let url = $('#stp_api_text_field_0').val();
            let key = $('#stp_api_text_field_1').val();
            let secret = $('#stp_api_text_field_2').val();
    
            $('#tableData').html( tableData );
    
            $('#pagination').removeClass('invisible');
    
            let settings = {
                "url": `${url}/wp-json/wc/v3/products?consumer_key=${key}&consumer_secret=${secret}`,
                "method": "GET",
                "timeout": 0,
            };
            
            $.ajax(settings).done(function (response) {
                let i = 0;
                $('#res').html('');
                for (let item of response) {
                    i++;
                    res.innerHTML += `
                        <tr>
                            <td id='${i}'>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.price}</td>
                            <td>${item.stock_status}</td>
                            <td>${item.stock_quantit}</td>
                        </tr>
                    `}
            });
    
            $('#btnSave').removeClass('invisible');
        });     
            
    
// create search 
        function createSearchProduct() {
            $('#searchData').html(`
                <form class="d-flex justify-content-end" role="search">
                    <input type="text" class="text me-2" name="SearchProduct" id="InputSearch" placeholder="Search" aria-label="Search">
                    <button type="button" class="btn btn-outline-secondary" name="btnSearch" id="btnSearch">Search</button>
                </form>
            `);
        }
    
    
// search products
        function searchProduct() {
            let url = $('#stp_api_text_field_0').val();
            let key = $('#stp_api_text_field_1').val();
            let secret = $('#stp_api_text_field_2').val();
            let search = $('input:text[name=SearchProduct]').val();
                
                $('#tableData').html( tableData );
    
                let settings = {
                    "url": `${url}/wp-json/wc/v3/products?search=${search}&consumer_key=${key}&consumer_secret=${secret}`,
                    "method": "GET",
                    "timeout": 0,
                };
                
                
                $.ajax(settings).done(function (response) {
                    $('#res').html('');
                    for (let item of response) {
                        res.innerHTML += `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>${item.price}</td>
                                <td>${item.stock_status}</td>
                                <td>${item.stock_quantit}</td>
                            </tr>
                        `}
                });
        }
            $( "#InputSearch" ).keyup(function() {
                searchProduct();
              });
    
            $('#btnSearch').click(function() {
                searchProduct();
            });
    
    
// pagination
        function pagination() {
            let numPagination = 1;
    
            $('#pagination').html(`
                <button type="button" class="btn btn-outline-dark invisible" id="btnBack"><--</button>
                <button type="button" class="btn btn-outline-dark" id="btnNext">--></button>
            `);
    
            $('#btnNext').click(function() {
                let url = $('#stp_api_text_field_0').val();
                let key = $('#stp_api_text_field_1').val();
                let secret = $('#stp_api_text_field_2').val();
                numPagination ++;
    
                if(numPagination > 1) {
                    $('#btnBack').removeClass('invisible');
                } else {
                    $('#btnBack').addClass('invisible');
                }
    
                let settings = {        
                    "url": `${url}/wp-json/wc/v3/products?page=${numPagination}&consumer_key=${key}&consumer_secret=${secret}`,
                    "method": "GET",
                    "timeout": 0,
                };
                
                $.ajax(settings).done(function (response) {
                    $('#res').html('');
                    for (let item of response) {
                        res.innerHTML += `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>${item.price}</td>
                                <td>${item.stock_status}</td>
                                <td>${item.stock_quantit}</td>
                            </tr>
                        `}
                });

                
            });
            
            $('#btnBack').click(function() {
                let url = $('#stp_api_text_field_0').val();
                let key = $('#stp_api_text_field_1').val();
                let secret = $('#stp_api_text_field_2').val();
                numPagination --;
    
                if(numPagination > 1) {
                    $('#btnBack').removeClass('invisible');
                } else {
                    $('#btnBack').addClass('invisible');
                }
    
                let settings = {
                    "url": `${url}/wp-json/wc/v3/products?page=${numPagination}&consumer_key=${key}&consumer_secret=${secret}`,
                    "method": "GET",
                    "timeout": 0,
                };
                
                $.ajax(settings).done(function (response) {
                    $('#res').html('');
                    for (let item of response) {
                        res.innerHTML += `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>${item.price}</td>
                                <td>${item.stock_status}</td>
                                <td>${item.stock_quantit}</td>
                            </tr>
                        `}
                });
            });
        }       
    });
    
