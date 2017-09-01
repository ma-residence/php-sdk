<?php

namespace MR\SDK;

use MR\SDK\Auth\OAuth;
use MR\SDK\TokenStorage\TokenStorageInterface;
use MR\SDK\Transport\Request;
use GuzzleHttp\HandlerStack;
use Psr\Log\LoggerInterface;

class Client
{
    const OPT_FOLLOW_LOCATION = 'follow_location';
    const OPT_ERRMODE_EXCEPTION = 'errmode_exception';

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
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string
     */
    private $tokenCacheKey;

    /**
     * @param $host
     * @param $clientId
     * @param $clientSecret
     * @param $tokenCacheKey
     * @param TokenStorageInterface|null $storage
     * @param null                       $logger
     * @param HandlerStack|null          $handlerStack
     * @param array                      $options
     */
    public function __construct(
        $host,
        $clientId,
        $clientSecret,
        $tokenCacheKey,
        TokenStorageInterface $storage = null,
        $logger = null,
        HandlerStack $handlerStack = null,
        array $options = []
    ) {
        $this->logger = $logger;
        $this->auth = new OAuth($this, $clientId, $clientSecret, $storage, $options);
        $this->request = new Request($this, $host, $handlerStack);

        $this->tokenCacheKey = $tokenCacheKey;
        $this->options = $options;
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
     * @return Endpoints\MarketEndpoint
     */
    public function markets()
    {
        return $this->getEndpoint('markets', Endpoints\MarketEndpoint::class);
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
     * @return Endpoints\CivicActionEndpoint
     */
    public function civicActions()
    {
        return $this->getEndpoint('civic_actions', Endpoints\CivicActionEndpoint::class);
    }

    /**
     * @return Endpoints\PollEndpoint
     */
    public function polls()
    {
        return $this->getEndpoint('polls', Endpoints\PollEndpoint::class);
    }

    /**
     * @return Endpoints\NewsEndpoint
     */
    public function news()
    {
        return $this->getEndpoint('news', Endpoints\NewsEndpoint::class);
    }

    /**
     * @return Endpoints\AlertEndpoint
     */
    public function alerts()
    {
        return $this->getEndpoint('alerts', Endpoints\AlertEndpoint::class);
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
     * @return Endpoints\NewsletterEndpoint
     */
    public function newsletters()
    {
        return $this->getEndpoint('newsletters', Endpoints\NewsletterEndpoint::class);
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
     * @return Endpoints\ContactEndpoint
     */
    public function contacts()
    {
        return $this->getEndpoint('contacts', Endpoints\ContactEndpoint::class);
    }

    /**
     * @return Endpoints\CustomerEndpoint
     */
    public function customers()
    {
        return $this->getEndpoint('customers', Endpoints\CustomerEndpoint::class);
    }

    /**
     * @return Endpoints\InvitationEndpoint
     */
    public function invitations()
    {
        return $this->getEndpoint('invitations', Endpoints\InvitationEndpoint::class);
    }

    /**
     * @return Endpoints\TeamEndpoint
     */
    public function teams()
    {
        return $this->getEndpoint('teams', Endpoints\TeamEndpoint::class);
    }

    public function blacklists()
    {
        return $this->getEndpoint('blacklists', Endpoints\BlackListEndpoint::class);
    }

    public function moderation()
    {
        return $this->getEndpoint('moderation', Endpoints\ModerationEndPoint::class);
    }

    /**
     * @return Endpoints\CardEndpoint
     */
    public function card()
    {
        return $this->getEndpoint('card', Endpoints\CardEndpoint::class);
    }

    /**
     * @return Endpoints\BookmarkEndpoint
     */
    public function bookmarks()
    {
        return $this->getEndpoint('bookmarks', Endpoints\BookmarkEndpoint::class);
    }

    /**
     * @param string $type
     *
     * @return Endpoints\Endpoint
     */
    public function endpoints($type)
    {
        // check if methods exist
        if (method_exists($this, $type)) {
            return call_user_func_array([$this, $type], []);
        }

        // check in cache
        if (isset($this->cachedEndpoints[$type])) {
            return $this->cachedEndpoints[$type];
        }

        $toCamelCase = function ($name) {
            return lcfirst(preg_replace_callback('/(^|_|\.)+(.)/', function ($match) {
                return ('.' === $match[1] ? '_' : '').strtoupper($match[2]);
            }, $name));
        };

        // check if camel case method exists
        $typeCamelCase = $toCamelCase($type);
        if (method_exists($this, $typeCamelCase)) {
            return call_user_func_array([$this, $typeCamelCase], []);
        }

        // if not check plural form
        if (substr($type, -1) != 's') {
            $typePlural = sprintf('%ss', $type);
        } else {
            $typePlural = rtrim($type, 's');
        }

        if (method_exists($this, $typePlural)) {
            return call_user_func_array([$this, $typePlural], []);
        }

        // check in cache
        if (isset($this->cachedEndpoints[$typePlural])) {
            return $this->cachedEndpoints[$typePlural];
        }

        // check if camel case method exists
        $typePluralCamelCase = $toCamelCase($typePlural);
        if (method_exists($this, $typePluralCamelCase)) {
            return call_user_func_array([$this, $typePluralCamelCase], []);
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

    /**
     * @return string
     */
    public function getTokenCacheKey()
    {
        return $this->tokenCacheKey;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param string $option
     * @param mixed  $value
     *
     * @return Client
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * @param string $option
     *
     * @return mixed
     */
    public function getOption($option)
    {
        return isset($this->options[$option]) ? $this->options[$option] : null;
    }

    /**
     * @param array    $options
     * @param callable $fn
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function withOptions(array $options, callable $fn)
    {
        $result = null;

        try {
            $previous = [];
            foreach ($options as $key => $value) {
                $previous[$key] = $this->getOption($key);
                $this->setOption($key, $value);
            }

            $result = $fn();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            foreach ($previous as $key => $value) {
                $this->setOption($key, $value);
            }
        }

        return $result;
    }
}
