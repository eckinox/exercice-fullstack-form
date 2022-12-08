<?php

namespace Repository;

use Model\Message;

class MessageRepository
{
	private const KEY_PREFIX = "message_";

	public static function persist(Message &$message): Message
	{
		if (!$message->getId()) {
			$message->setId(static::nextId());
		}

		$key = static::KEY_PREFIX . $message->getId();
		$payload = urlencode(serialize($message));
		
		$ch = curl_init(getenv("REPLIT_DB_URL"));
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$key=$payload");
		curl_exec($ch);
		$error = curl_error($ch);
		
		curl_close($ch);

		if ($error) {
		  throw new \Exception($error);
		}

		return $message;
	}
	
	public static function find(int $id): Message
	{
		return static::findByKey(static::KEY_PREFIX . $id);
	}

	public static function findAll(): array
	{
		$items = [];
		
		foreach (static::findAllKeys() as $key) {
			$items[] = static::findByKey($key);
		}

		// Sort messages from newest to oldest
		usort($items, function (Message $a, Message $b) {
			return $a->getDateCreated() > $b->getDateCreated() ? -1 : 1;
		});
		
		return $items;
	}
	
	private static function findByKey(string $key): Message
	{
		$queryUrl = getenv("REPLIT_DB_URL") . "/" . $key;
		$response = @file_get_contents($queryUrl);

		if (!$response) {
			throw new \Exception("No message could be found for key $key.");
		}

		return unserialize($response);
	}

	private static function findAllKeys(): array
	{
		$queryUrl = getenv("REPLIT_DB_URL") . "?prefix=" . static::KEY_PREFIX;
		$keys = explode("\n", file_get_contents($queryUrl));
		
		return array_filter($keys);
	}

	private static function nextId(): int
	{
		$keys = static::findAllKeys();

		if (!$keys) {
			return 1;
		}
		
		natsort($keys);
		$lastKey = array_pop($keys);
		$lastId = (int)substr($lastKey, strlen(static::KEY_PREFIX));

		return $lastId + 1;
	}
}