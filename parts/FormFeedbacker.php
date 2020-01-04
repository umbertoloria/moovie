<?php

class FormFeedbacker {

	private $message;

	public function message($message) {
		$this->message = $message;
	}

	public function process() {
		if (!is_null($this->message)) {
			?>
			<style>

				body {
					margin: 0;
					height: 100vh;
					font-family: sans-serif;
					font-size: 20px;
					background: #888;
					display: flex;
					align-items: center;
					justify-content: center;
				}

				#form_error {
					min-width: 250px;
					border-radius: 2px;
					box-shadow: 0 0 50px 10px rgba(0, 0, 0, .2);
					background: #eee;
					text-align: center;
				}

				#form_error p {
					display: block;
					margin: 0;
					padding: 30px;
					background: #bbb;
				}

				#form_error a {
					display: block;
					margin: 0;
					padding: 0;
					background: #999;
					color: #555;
					text-shadow: 0 1px 0 rgba(255, 255, 255, .8);
					font-size: 2.2em;
					line-height: 80px;
					text-decoration: none;
					transition: .3s;
				}

				#form_error a:hover {
					color: #333;
					box-shadow: 0 0 50px 10px rgba(0, 0, 0, .1);
					z-index: 10;
				}
			</style>
			<div id="form_error">
				<p>
					<?php echo $this->message; ?>
				</p>
				<a href='javascript:history.back()'>↩</a>
			</div>
			<?php
		}
	}

}