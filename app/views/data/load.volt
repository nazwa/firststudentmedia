


<h2>Data reload finished</h2>
<ul>
    <li>Time: {{ results['finished'] }}</li>
    <li>Duration: {{ results['duration'] }}</li>
    <li>Sources: {{ results['sources'] }}</li>
    <li>New articles: {{ results['saved'] }}</li>
    <li>Already in system: {{ results['existing'] }}</li>  
    <li>Total articles: {{ results['total'] }}</li>
    <li>New keywords: {{ results['keywords'] }}</li>
</ul>     
<ul>
    {%  for item in results['errors'] %}
        <li>- {{ item }}</li>        
    {% endfor %}
</ul>     
                                   
<ul>
    {%  for item in results['list'] %}
        <li>- {{ item }}</li>        
    {% endfor %}
</ul>                                        