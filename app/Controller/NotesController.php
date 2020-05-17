<?php

App::uses('AppController', 'Controller'); // giống namespace laravel

class NotesController extends AppController
{
	public function index()
	{
		        // model:Note
//		$notes = $this->Note->find('all');
		//$notes = $this->Note->find('all', array('order' => array('Note.title' => 'asc'))); // order by
		$notes = $this->Note->find('all', array(
			'order' => array('Note.title' => 'asc'),
			'fields' => array('id', 'title')
		));

		$this->set('notes', $notes); // compact('notes')
//		pr($notes);exit();
	}

	public function view($id = null)
	{
		$this->Note->id = $id;
		if($this->Note->exists()) { // check if exists
//			$this->Note->findById($id);
			$note = $this->Note->read(null, $id); // null = get all field with this $id
			$this->set('note', $note);
		} else {
			throw new NotFoundException('Not found this record');
		}
	}

	public function add()
	{
		if($this->request->is('post')) {
			// validate
			$this->Note->set($this->request->data);
			if($this->Note->validates) { // validate successfully => create
				if($this->Note->save($this->request->data)) { // $this->Note->save($this->request->data, false) tắt validate ở model vì controller validate rồi
					$this->Session->setFlash('Ghi chú đã được lưu lại');
					$this->redirect('/');
				} else {
					$this->Session->setFlash('Something went wrong');
				}
			} else { // validate failed
				$errors = $this->Note->validationErrors;
				$this->set('errors', $errors); // compact errors to view
			}
		}
	}

	public function edit($id = null)
	{
		$this->Note->id = $id;
		if($this->Note->exists()) {
//			pr($this->request->method());
			if($this->request->is('put') || $this->request->is('post')) {
				if($this->Note->save($this->request->data)) {
					$this->Session->setFlash('Updated successfully');
					$this->redirect('/');
				} else {
					$this->Session->setFlash('Something went wrong');
				}
			} else {
				$this->request->data = $this->Note->read(null, $id); // fill data into form
			}
		} else {
			throw new NotFoundException('Not found this record');
		}
	}

	public function delete($id = null)
	{
		if($this->request->is('post')) {
			$this->Note->id = $id;
			if($this->Note->exists()) {
				if($this->Note->delete($id)) {
					$this->Session->setFlash('Deleted successfully');
					$this->redirect('/');
				} else {
					$this->Session->setFlash('Something went wrong');
				}
			} else {
				throw new NotFoundException('Not found this record');
			}
		} else {
			throw new MethodNotAllowedException('This route not support this route');
		}
	}
}
