<?php

namespace MR\SDK;

use GuzzleHttp\HandlerStack;
use MR\SDK\Auth\OAuth;
use MR\SDK\TokenStorage\TokenStorageInterface;
use MR\SDK\Transport\Request;

class Client
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var OAuth
     */
    private $auth;

    /**
     * @var Endpoints\Endpoint[]
     */
    private $cachedEndpoints = [];

    /**
     * @var array
     */
    private $handlerStack = [];

    /**
     * @param string                $host
     * @param string                $clientId
     * @param string                $clientSecret
     * @param HandlerStack          $handlerStack
     * @param TokenStorageInterface $storage
     */
    public function __construct($host, $clientId, $clientSecret, TokenStorageInterface $storage = null, HandlerStack $handlerStack = null)
    {
        $this->auth = new OAuth($this, $clientId, $clientSecret, $storage);
        $this->request = new Request($this, $host, $handlerStack);
    }

    /**
     * @return Endpoints\MeEndpoint
     */
    public function me()
    {
        return $this->getEndpoint('me', Endpoints\MeEndpoint::class);
    }

    /**
     * @return Endpoints\UserEndpoint
     */
    public function users()
    {
        return $this->getEndpoint('users', Endpoints\UserEndpoint::class);
    }

    /**
     * @return Endpoints\ForgotPasswordEndPoint
     */
    public function forgetPassword()
    {
        return $this->getEndpoint('forget_password', Endpoints\ForgotPasswordEndpoint::class);
    }

    /**
     * @return Endpoints\GroupEndpoint
     */
    public function groups()
    {
        return $this->getEndpoint('groups', Endpoints\GroupEndpoint::class);
    }

    /**
     * @return Endpoints\AssociationEndpoint
     */
    public function associations()
    {
        return $this->getEndpoint('associations', Endpoints\AssociationEndpoint::class);
    }

    /**
     * @return Endpoints\HallNumericEndpoint
     */
    public function hallNumerics()
    {
        return $this->getEndpoint('hall_numerics', Endpoints\HallNumericEndpoint::class);
    }

    /**
     * @return Endpoints\ShopEndpoint
     */
    public function shops()
    {
        return $this->getEndpoint('shops', Endpoints\ShopEndpoint::class);
    }

    /**
     * @return Endpoints\CityHallEndpoint
     */
    public function cityHalls()
    {
        return $this->getEndpoint('city_halls', Endpoints\CityHallEndpoint::class);
    }

    /**
     * @return Endpoints\RealEstatePlayerEndpoint
     */
    public function realEstatePlayers()
    {
        return $this->getEndpoint('real_estate_players', Endpoints\RealEstatePlayerEndpoint::class);
    }

    /**
     * @return Endpoints\LotEndpoint
     */
    public function lots()
    {
        return $this->getEndpoint('lots', Endpoints\LotEndpoint::class);
    }

    /**
     * @return Endpoints\PlaceEndpoint
     */
    public function places()
    {
        return $this->getEndpoint('places', Endpoints\PlaceEndpoint::class);
    }

    /**
     * @return Endpoints\CategoryEndpoint
     */
    public function categories()
    {
        return $this->getEndpoint('categories', Endpoints\CategoryEndpoint::class);
    }

    /**
     * @return Endpoints\RoleEndpoint
     */
    public function roles()
    {
        return $this->getEndpoint('roles', Endpoints\RoleEndpoint::class);
    }

    /**
     * @return Endpoints\MemberOfEndpoint
     */
    public function members()
    {
        return $this->getEndpoint('members', Endpoints\MemberOfEndpoint::class);
    }

    /**
     * @return Endpoints\TopicEndpoint
     */
    public function topics()
    {
        return $this->getEndpoint('topics', Endpoints\TopicEndpoint::class);
    }

    /**
     * @return Endpoints\LikeEndpoint
     */
    public function likes()
    {
        return $this->getEndpoint('likes', Endpoints\LikeEndpoint::class);
    }

    /**
     * @return Endpoints\FollowEndpoint
     */
    public function follows()
    {
        return $this->getEndpoint('follows', Endpoints\FollowEndpoint::class);
    }

    /**
     * @return Endpoints\ParticipateEndpoint
     */
    public function participates()
    {
        return $this->getEndpoint('participates', Endpoints\ParticipateEndpoint::class);
    }

    /**
     * @return Endpoints\CommentEndpoint
     */
    public function comments()
    {
        return $this->getEndpoint('comments', Endpoints\CommentEndpoint::class);
    }

    /**
     * @return Endpoints\DonationEndpoint
     */
    public function donations()
    {
        return $this->getEndpoint('donations', Endpoints\DonationEndpoint::class);
    }

    /**
     * @return Endpoints\EventEndpoint
     */
    public function events()
    {
        return $this->getEndpoint('events', Endpoints\EventEndpoint::class);
    }

    /**
     * @return Endpoints\NewsEndpoint
     */
    public function news()
    {
        return $this->getEndpoint('news', Endpoints\NewsEndpoint::class);
    }

    /**
     * @return Endpoints\RecommendationEndpoint
     */
    public function recommendations()
    {
        return $this->getEndpoint('recommendations', Endpoints\RecommendationEndpoint::class);
    }

    /**
     * @return Endpoints\ShareEndpoint
     */
    public function shares()
    {
        return $this->getEndpoint('shares', Endpoints\ShareEndpoint::class);
    }

    /**
     * @return Endpoints\TradeEndpoint
     */
    public function trades()
    {
        return $this->getEndpoint('trades', Endpoints\TradeEndpoint::class);
    }

    /**
     * @return Endpoints\TransactionEndpoint
     */
    public function transactions()
    {
        return $this->getEndpoint('transactions', Endpoints\TransactionEndpoint::class);
    }

    /**
     * @return Endpoints\MediaEndpoint
     */
    public function medias()
    {
        return $this->getEndpoint('medias', Endpoints\MediaEndpoint::class);
    }

    /**
     * @return Endpoints\NotificationEndpoint
     */
    public function notifications()
    {
        return $this->getEndpoint('notifications', Endpoints\NotificationEndpoint::class);
    }

    /**
     * @return Endpoints\DiffusionEndpoint
     */
    public function diffusions()
    {
        return $this->getEndpoint('diffusions', Endpoints\DiffusionEndpoint::class);
    }

    /**
     * @return Endpoints\WidgetEndpoint
     */
    public function widgets()
    {
        return $this->getEndpoint('widgets', Endpoints\WidgetEndpoint::class);
    }

    /**
     * @return Endpoints\PublicationEndpoint
     */
    public function publications()
    {
        return $this->getEndpoint('publications', Endpoints\PublicationEndpoint::class);
    }

    /**
     * @return Endpoints\ProfileEndpoint
     */
    public function profiles()
    {
        return $this->getEndpoint('profiles', Endpoints\ProfileEndpoint::class);
    }

    /**
     * @return Endpoints\SitemapEndpoint
     */
    public function sitemap()
    {
        return $this->getEndpoint('sitemap', Endpoints\SitemapEndpoint::class);
    }

    /**
     * @return Endpoints\LendObjectEndpoint
     */
    public function lendObjects()
    {
        return $this->getEndpoint('lend_objects', Endpoints\LendObjectEndpoint::class);
    }

    /**
     * @return Endpoints\JoinRequestEndpoint
     */
    public function joinRequests()
    {
        return $this->getEndpoint('join_requests', Endpoints\JoinRequestEndpoint::class);
    }

    /**
     * @param string $type
     *
     * @return Endpoints\TransactionEndpoint
     */
    public function endpoints($type)
    {
        if (method_exists($this, $type)) {
            return call_user_func_array([$this, $type], []);
        }

        $type = sprintf('%ss', $type);
        if (method_exists($this, $type)) {
            return call_user_func_array([$this, $type], []);
        }

        throw new \InvalidArgumentException("Unknown endpoint type $type");
    }

    /**
     * @param string $endpoint
     * @param string $class
     *
     * @return Endpoints\Endpoint
     */
    private function getEndpoint($endpoint, $class)
    {
        if (!isset($this->cachedEndpoints[$endpoint])) {
            $this->cachedEndpoints[$endpoint] = new $class($this->request);
        }

        return $this->cachedEndpoints[$endpoint];
    }

    /**
     * @return Request
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * @return OAuth
     */
    public function auth()
    {
        return $this->auth;
    }
}
