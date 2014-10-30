<!-- Rendered on: <?php echo date('d/m/Y H:i:s', time()); ?> -->   
<div id="newItems" class="isotope">      
    {% for  i, story in new %}            
        <div class="item {{ story.getCategory().getName() }}" 
            data-published="{{ story.getDatePublished() }}" 
            data-category="{{ story.getCategory().getName() }}" 
            data-source="{{ story.getWebsite().getWebsite() }}" 
            data-stars="{{ story.getScore() }}"
            data-clicks="{{ story.getClicks() }}"
            data-date="{{ date('Y-m-d', story.getDatePublished()) }}"
            data-id="{{ story.getFeedId() }}"
            data-slug="{{ story.getSlug() }}">
            
            <h2 class="small">
                {% set sim = story.countSimilar() %}    
                {{story.getTitle() | trim}}
                {% if sim > 0 %}
                    ({{ sim }}) 
                {% endif %}
            </h2>
            <p class="small">
                {{story.getDescription() }}...
            </p>                                                                                                                           
        </div>   
    {% endfor %}               
</div>     
          
<div id="details-modal" class="reveal-modal medium">
    <div class="content"></div>    
    <a class="close-reveal-modal">&#215;</a>
</div>