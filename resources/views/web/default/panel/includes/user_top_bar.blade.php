


<div class="modal fade switch_user_modal" 
    id="switch_user_modal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="switchUserModalTitle"
    aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-box">
                    <div class="modal-title">
                        <h3 id="switchUserModalTitle">Enter the Password</h3>
                    </div>
                    <form method="post" action="/switch-user" class="mt-35 switch_user_login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="input-label" for="password">Password:</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                               aria-describedby="passwordHelp">
                        <input type="hidden" name="user_id" value="{{isset($parent_id)? $parent_id : 0}}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-20">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
