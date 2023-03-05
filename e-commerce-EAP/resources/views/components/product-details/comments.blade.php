<div class="tab-pane fade" id="Reviews">
    <!--Comments-->
    <div class="comments-area">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="mb-30">Customer questions & answers</h4>
                <div class="comment-list">
                    @foreach($comments as $comment)
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb text-center">
                                    <h6><a href="#">{{$comment->user->name}}</a></h6>
                                </div>
                                <div class="desc">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <p>{{$comment->body}}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <p class="font-xs mr-30">{{$comment->created_at->format('d/m/Y')}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <!--comment form-->
    <div class="comment-form">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form class="form-contact comment_form" action="{{route('comment.store')}}" method="post" id="commentForm">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="body" cols="30" rows="9" placeholder="Write Comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm">Submit
                            Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>