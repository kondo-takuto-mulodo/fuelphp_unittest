<?php
class Controller_Messages extends Controller_Template
{
		public function action_index()
		{
			$data['messages'] = Model_Message::get_all();
			$data['hot_message'] = Helper_Common::get_hot_items($data['messages'],'views');

			$this->template->title = 'Messages';
			$this->template->content = View::forge('messages/index', $data);
		}

		public function action_view($id = null)
		{
			is_null($id) and Response::redirect('messages');

			if ( ! $data['message'] = Model_Message::find($id))
			{
				Session::set_flash('error', 'Could not find message #'.$id);
				Response::redirect('messages');
				return;
			}

			Helper_Message::update_views_for_message($data['message']);

			$this->template->title = 'View Message';
			$this->template->content = View::forge('messages/view', $data);
		}

		public function action_new($id = null)
		{
			if ($message = Model_Message::find($id))
			{
				$this->template->set_global('message', $message, false);
			}

			$this->template->title = 'New Message';
			$this->template->content = View::forge('messages/create');
		}

		public function action_create()
		{
			$val = Model_Message::validate('create'.(new DateTime())->getTimestamp());

			if ($val->run(Input::post()))
			{
				$message = Model_Message::forge(array(
					'name'                                    => Input::post('name'),
					'message'                                 => Input::post('message'),
					'views'                                   => 0,
				));

				$message->save();
				Session::set_flash('success', 'Added message #'.$message->id.'.');
				Response::redirect('messages');
				return;
			}
			else
			{
				Session::set_flash('error', $val->error());
			}

			$this->template->title = 'New Message';
			$this->template->content = View::forge('messages/create');
		}

		public function action_edit($id = null)
		{
			is_null($id) and Response::redirect('messages');

			if ( ! $message = Model_Message::find($id))
			{
				Session::set_flash('error', 'Could not find message #'.$id);
				Response::redirect('messages');
				return;
			}

			$this->template->set_global('message', $message, false);

			$this->template->title = 'Edit Message';
			$this->template->content = View::forge('messages/edit');
		}

		public function action_update($id = null)
		{
			is_null($id) and Response::redirect('messages');

			if ( ! $message = Model_Message::find($id))
			{
				Session::set_flash('error', 'Could not find message #'.$id);
				Response::redirect('messages');
				return;
			}

			$val = Model_Message::validate('edit'.(new DateTime())->getTimestamp());

			if ($val->run(Input::post()))
			{
				$message->name = Input::post('name');
				$message->message = Input::post('message');

				$message->save();
				Session::set_flash('success', 'Updated message #'.$id);
				Response::redirect('messages');
				return;
			}
			else
			{
				Session::set_flash('error', $val->error());
				$this->template->set_global('message', $message, false);
			}

			$this->template->title = 'Edit Message';
			$this->template->content = View::forge('messages/edit');
		}

		public function action_delete($id = null)
		{
			is_null($id) and Response::redirect('messages');

			if ($message = Model_Message::find($id))
			{
				$message->delete();
				Session::set_flash('success', 'Deleted message #'.$id);
			}
			else
			{
				Session::set_flash('error', 'Could not delete message #'.$id);
			}

			Response::redirect('messages');
		}

}
