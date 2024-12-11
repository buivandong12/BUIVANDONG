<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
      @foreach($posts as $post)
    <p>{{ $post->content }}</p>
    @endforeach  
    
</div>