<?php
function redirect_user (){
    header('Location: http://localhost/projects/eassy/');
    exit();
}

function check_login($dbc,$email,$pass){
    $error = array();

    $q = "SELECT id FROM users WHERE email='$email' AND password=SHA1('$pass')";
    $r = @mysqli_query($dbc, $q);

    if (mysqli_num_rows($r)==1){
        $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
        return array(true, $row);
    }
    else {
        $error[]='The email address and password entered do not match';
        return array(false, $error);
    }
}
function signup($dbc,$email,$pass){
    $vocab_list = '[["Time","currently","during","eventually","finally","formerly","immediately","initially","lastly","later","meanwhile","next","once","previously","simultaneously","subsequently"],["Causal Relationship","since","because","due to","as a result","whereby","so","accordingly","therefore","hence","consequently","thus","thence","therefrom","corollary"],["Conclusion","in a word","in conclusion","in brief","in short","in summary","overall","to sum up","on the whole","to summarize","to conclude","given these facts"],["Example","for example","for instance","in particular","particularly","to illustrate","to demonstrate","consider this"],["Analogy","similarly","likewise","equally"],["Turn","in contrast","on the contrary","instead","conversely","however","nevertheless","unfortunately","although","whereas"],["Emphasis","in particular","especially","indeed","apparently","of course","clearly","obviously","in fact","after all"],["Progressive Relationship","besides","furthermore","in addition","moreover","likewise","in deed","in fact","as well","in truth"],["Concession","presumably","probably","possibly","perhaps","mostly","nearly","almost","occasionally","generally","commonly"],["Absolution","totally","absolutely","entirely","thoroughly","completely","undoubtedly","exactly","definitely","extremely","by no means","certainly","without doubt","needless to say"],["Describe","vivid","portray","depict","exhibit","illustrate","expose","present","paint a portrait","limn","delineate","represent","demonstrate","constitute","embody","embodiment"],["Condition","provision","given","if","whether","whenever","when","while"],["Intensify","incredibly","exceedingly","extremely","extraordinarily","truly","really","very","utterly","absolutely","perfectly","sublimely","dramatically"]]';
    $outline = '[{"text":"Introduction"},{"text":"Body","nodes":[{"text":"Paragraph 1"},{"text":"Paragraph 2"},{"text":"Paragraph 3"}]},{"text":"Conclusion"}]';
    $q = "INSERT INTO users (id, email, password, vocab_list, outline) VALUES (NULL, '$email', SHA1('$pass'), '$vocab_list', '$outline')";
    if (mysqli_query($dbc, $q)) {
        list($check, $data) = check_login($dbc,$email,$pass);
        essay($dbc, $data['id']);

        if($check){
            $_SESSION['id'] = $data['id'];
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else{
            $error = $data;
            echo $error[0];
        }
    }
    else {
        echo "Error: " . $q . "<br>" . mysqli_error($dbc);
    }

}
function essay($dbc,$id){
    $intro = '{"ip1":"","ip2":"","ip3":"","ip4":"","ip5":"","ip6":""}';
    $body = '{"b1":"","b2":"","b3":"","b4":"","b5":"","b6":"","b7":"","b8":"","b9":""}';
    $conclusion = '{"c1":"","c2":"","c3":"","c4":"","c5":"","c6":""}';
    $citation = '{"cit":""}';
    $q = "INSERT INTO essay (id, user_id, intro_type, intro, body, conclusion_type, conclusion, citation)
 VALUES (NULL,'$id', '1', '$intro', '$body', '1', '$conclusion', '$citation')";
    mysqli_query($dbc, $q);
}