

{% if item %}

<div class="infoContainer">      
    <div id="infoRating_{{ item.getFeedId() }}" class="infoRating" data-id="{{ item.getFeedId() }}">
                                                      
                {{ item.getStars() }}    
          
    </div> 
    <div class="infoDate">
        {{ date('l, d F Y, H:i', item.getDatePublished()) }}    
    </div>  
    <div class="clearfloat"></div>
    
    <div class="infoLeft">                                      
        {% set image = item.getImage() %}   
        {% if image %}
        <div class="infoPicture">
            <img src="{{ image }}">
        </div>
    {% endif %}
    
    </div>
    <div class="infoRight">
        <div class="infoTitle">
             <h4>{{ item.getTitle() }}</h4>   
        </div> 
        <div class="infoDescription">
            <p class="">{{ item.getDescriptionLong()}}</p>
        </div>
    
    </div>
    
    <div class="clearfloat"></div>
                      
    
            
          
              
    <div class="infoLink">                                                                                                                 
        Read more on:  <a href="/media/redirect/{{ item.getFeedId() }}/" target="_blank" rel="author">{{ item.getWebsite().getWebsite() }}</a>  
    </div>       
    
    {% set similars = item.getSimilar() %}
    {% if similars is iterable %}
        <div class="infoSimilar">  
            <h6> </h6>
            <h6>Similar stories</h6>
            <ul>             
                {% for similar in similars %}
                    <li><a href="/media/redirect/{{ similar.getFeedId() }}/" target="_blank" rel="author">{{ similar.getTitle() }}</a></li>    
                {% endfor %}
            </ul>              
        </div>    
    {% endif %}                       
                  
</div>                                                                

{% else %}
    <p>Article not found.</p>
{% endif %}
                                          