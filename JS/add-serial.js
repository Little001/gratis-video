var sql_query = "";
var series_number;
var series;
$( document ).ready(function() {
    series = $('#series');
    series_number = $( "#series_count" ).val();
    $('<div><h3>1-serie: </h3>'+epizodes(1)+'</div>').appendTo(series);

    $( "#series_count" ).change(function() {
        if($(this).val() < 0){
            $(this).val(0);
        }
        else{
            buildTables();    
        }
    });
    
    $( "#add_serial" ).click(function() {
        getSqlQuery();
        $( ".result" ).text(sql_query.substring(0, sql_query.length-1));  
    });
});



/*Function for build tables for series*/
var buildTables = function(){
    var count = $( "#series_count" ).val();
    if(Number(series_number) > Number(count)){
        //delete table
        $( "#series > div" ).last().remove();
    }
    else{
        //add table
        $('<div><h3>'+count+'serie: </h3>'+epizodes(count)+'</div>').appendTo(series);
    }
    series_number = $( "#series_count" ).val(); 
}


/*Function get full sql query*/
var getSqlQuery = function(){
    sql_query = 'INSERT INTO serials (serial_name, epizode_name, serie, epizode, language, genre, path, date_added) VALUES ';
    $( "#series .epizo" ).each(function() {
        var last = false;
        if($(this).find(".epizode").attr('id') == ($( "#series .epizo" ).last()).find('.epizode').attr('id')){
            last = true;
        }
        if($(this).find(".epizode").val()){
            queryGenerator(this, $('#serial_name').val(), $('#genre').val(), last);    
        }
    });
    return sql_query;
}

/*Function get values for actual epizode*/
var queryGenerator = function(element, serial_name, genre, last){
    var epi = $(element).find($(".epizode"));
    var res = $(epi).attr('id').split("_");
    var epizode_name = $(epi).val();
    var serie = res[0].slice(1);
    var epizode = res[1].slice(1);  
    var path = "videos/serials/" + serial_name + "/" + serie + "/" + epizode + ".mp4";
    var language = $(element).find($(".dab"));
    language = $(language).val();
    sql_query += '("'+serial_name+'", "'+epizode_name+'", '+serie+', '+epizode+', "'+language+'", "'+genre+'", "'+path+'",now())';
    if(!last){
       sql_query += ',';   
    }
}

/*Function build table for one series*/
var epizodes = function(serie){
    var html = '';
    for(var i = 1; i <= 5; i++){
        var epizode = 's'+serie+'_e'+i;
        html += '<div class="epizo">';
        html +=     '<span><b>'+i+'</b>&nbsp</span>';
        html +=     '<label for="'+epizode+'">Název: </label>';
        html +=     '<input class="epizode" type="text" id="'+epizode+'" name="dab_'+epizode+'"/>';
        html +=     '<div class="language">'
        html +=     '<label for="dab_'+epizode+'">Dabing: </label>';
        html +=     '<input class="dab" type="text" id="dab_'+epizode+'" name="dab_'+epizode+'"/>';
        html +=     '</div>';
        html += '</div>';
    }
    return html;   
};