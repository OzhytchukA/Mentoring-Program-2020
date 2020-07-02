<?php

class SinglyLinkedListNode
{
	public $data;
	public $next;

	public function __construct($node_data)
	{
		$this->data = $node_data;
		$this->next = null;
	}
}

class SinglyLinkedList
{
	public $head;
	public $tail;

	public function __construct()
	{
		$this->head = null;
		$this->tail = null;
	}

	public function insertNode($node_data)
	{
		$node = new SinglyLinkedListNode($node_data);

		if (is_null($this->head)) {
			$this->head = $node;
		} else {
			$this->tail->next = $node;
		}

		$this->tail = $node;
	}
}

function printSinglyLinkedList($node, $sep, $fptr)
{
	while (!is_null($node)) {
		fwrite($fptr, $node->data);

		$node = $node->next;

		if (!is_null($node)) {
			fwrite($fptr, $sep);
		}
	}
}

// Complete the removeDuplicates function below.

/*
 * For your reference:
 *
 * SinglyLinkedListNode {
 *     int data;
 *     SinglyLinkedListNode next;
 * }
 *
 */

/* PLEASE COPY THE CODE FRAGMENT AND ADD IT TO THE SITE */
function removeDuplicates($llist)
{
	$current = $llist;
	$next = $llist->next;

	while ($next !== null) {
		if ($current->data === $next->data) {
			$current->next = $next->next;
		} else {
			$current = $next;
		}
		$next = $next->next;
	}

	return $llist;
}
/* PLEASE COPY THE CODE FRAGMENT AND ADD IT TO THE SITE */

$fptr = fopen(getenv("OUTPUT_PATH"), "w");