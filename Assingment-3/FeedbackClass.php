<?php

class FeedbackClass {
    private $feedbackDir = "feedback/";

    public function __construct() {
        if (!is_dir($this->feedbackDir)) {
            mkdir($this->feedbackDir, 0777, true);
        }
    }

    public function saveFeedback($feedback) {
        $feedbackFile = $this->feedbackDir . md5($feedback) . ".txt";

        if (file_exists($feedbackFile)) {
            return ["error" => "Feedback already exists."];
        }

        if (file_put_contents($feedbackFile, $feedback) !== false) {
            return ["success" => "Feedback successful."];
        } else {
            return ["error" => "Feedback failed."];
        }
    }
}
?>
