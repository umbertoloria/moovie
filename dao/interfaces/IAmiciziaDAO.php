<?php

interface IAmiciziaDAO {

	/**
	 * @param int $user_id
	 * @return Amicizia[]
	 */
	public function getFriendships(int $user_id): array;

	/**
	 * @param int $user_id
	 * @return Amicizia[]
	 */
	public function getRequests(int $user_id): array;

	public function existsSomethingBetween(int $user1, int $user2): bool;

	public function requestFriendshipFromTo(int $user_from, int $user_to): bool;

	public function existsRequestFromTo(int $user_from, int $user_to): bool;

	public function removeFriendshipRequestFromTo(int $user_from, int $user_to): bool;

	public function acceptFriendshipRequestFromTo(int $user_from, int $user_to): bool;

	public function refuseFriendshipRequestFromTo(int $user_from, int $user_to): bool;

	public function existsFriendshipBetween(int $user1, int $user2): bool;

	public function removeFriendshipBetween(int $user1, int $user2): bool;

}