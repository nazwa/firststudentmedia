
<div id="contentwrapper">             
    <div id="inside">
        {% cache ('media-homepage') 300 %} 
            {{ content() }}
        {% endcache %}
    </div>                           
</div>     
            
<div id="leftcolumn">    
    <div class="box-logo">
        <a href="/"><img src="/img/1st.png" alt="1st Student Media"></a>  
    </div>
    <div class="box-about">
        <p>Welcome to 1st student media, the only site that has the latest news from every student newspaper</p>
    </div>  
          
    {% cache ('sidebar-filters') 3600 %}          
        <!-- Rendered on: <?php echo date('d/m/Y H:i:s', time()); ?> -->   
        {% include "media/filters.volt" %}
    {% endcache %}
     
     
       
</div>  