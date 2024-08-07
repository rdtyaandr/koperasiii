<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <span class="card-title blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">History</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" style="margin-top: 10px;">
                            <div class="search-container left">
                                <input type="text" id="search" placeholder="Search history..." class="search-input">
                                <button class="search-button"><i class="material-icons grey-text">search</i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="message-container">
                                <?php foreach (array_reverse($messages) as $message): ?>
                                    <div class="message-item">
                                        <div class="message-icon">
                                            <i class="material-icons"><?= $message->message_icon ?></i>
                                        </div>
                                        <div class="message-content">
                                            <p class="message-text"><?= $message->message_text ?></p>
                                            <p class="message-summary"><?= $message->message_summary ?></p>
                                            <p class="message-date-time"><?= $message->message_date_time ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-title {
        font-weight: bold;
    }

    .card-content {
        padding-bottom: 0;
    }

    .search-container {
        position: relative;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .search-input {
        width: 100%;
        padding: 10px 15px;
        border-radius: 25px;
        border: 1px solid #e0e0e0;
        font-size: 1em;
        outline: none;
        transition: border-color 0.3s;
    }

    .search-input:focus {
        border-color: #2196F3;
        /* Blue border on focus */
    }

    .search-button {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: #2196F3;
        font-size: 1.2em;
        transition: color 0.3s;
    }

    .search-button:hover {
        color: #1976D2;
        /* Darker blue on hover */
    }

    .message-container {
        margin-top: 20px;
    }

    .message-item {
        display: flex;
        align-items: flex-start;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        margin-bottom: 15px;
        background-color: #ffffff;
        transition: background-color 0.3s, box-shadow 0.3s;
        position: relative;
    }

    .message-item:hover {
        background-color: #e3f2fd;
        /* Light blue on hover */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .message-item:last-child {
        margin-bottom: 0;
    }

    .message-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e3f2fd;
        /* Light blue background */
        border-radius: 50%;
        color: #2196F3;
        /* Blue color for icons */
        margin-right: 15px;
    }

    .message-content {
        flex: 1;
        position: relative;
    }

    .message-text {
        font-weight: bold;
        margin: 0;
        color: #333;
        font-size: 1.1em;
    }

    .message-summary {
        margin: 5px 0;
        color: #555;
        /* Slightly darker grey */
        font-size: 0.9em;
    }

    .message-date-time {
        font-size: 0.8em;
        color: #999;
        /* Lighter grey */
        margin-top: 5px;
    }

    .message-badge {
        background-color: #4caf50;
        /* Green color for badges */
        color: white;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 0.8em;
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .message-badge.new {
        background-color: #FF5722;
        /* Red color for "New" badge */
    }
</style>

<script>
    document.getElementById('search').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let messages = document.querySelectorAll('.message-item');

        messages.forEach(function(message) {
            let text = message.querySelector('.message-text').textContent.toLowerCase();
            let summary = message.querySelector('.message-summary').textContent.toLowerCase();

            if (text.includes(filter) || summary.includes(filter)) {
                message.style.display = '';
            } else {
                message.style.display = 'none';
            }
        });
    });
</script>