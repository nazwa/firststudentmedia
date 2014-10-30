<div class="box-filters">
    <ul class="filters">
        <li><h4>Filter</h4></li>
        <li><a class="All" data-filter="*">All</a></li>
        <?php  $categories = Categories::find(array('column' => 'name')) ; ?>
        {% for  i, category in categories %}            
            <li><a class=" {{ category.getName() }}" data-filter=".{{ category.getName() }}">{{ category.getName() }}</a></li>
        {% endfor %}  
    </ul>
</div>
{#
<div class="box-filters">    
    <ul id="sort-by" class="filters">
        <li><h4>Sort</h4></li>
        <li><a class="active" href="#date" >Date</a></li>    
        <li><a class="" href="#stars" >Votes</a></li>    
        <li><a class="" href="#clicks" >Clicks</a></li>  
        <li><a class="" href="#category" >Category</a></li>
        <li><a class="" href="#source" >Source</a></li>  
    </ul> 
</div>


#}