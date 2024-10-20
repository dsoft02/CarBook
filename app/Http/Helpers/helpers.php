<?php

if (!function_exists('getPageTitle')) {
    /**
     * Get site name and page title.
     *
     * @param string $pageTitle
     * @return string
     */
    function getPageTitle($pageTitle = '') {
        $siteName = 'CarBook';
        return $pageTitle ? "{$siteName} - {$pageTitle}" : $siteName;
    }
}

if (!function_exists('isActiveRoute')) {
    /**
     * Check if the given route name is active.
     *
     * @param string|array $routeNames
     * @return string
     */
    function isActiveRoute($routeNames)
    {
        if (is_array($routeNames)) {
            return in_array(Route::currentRouteName(), $routeNames) ? 'active' : '';
        }

        return Route::currentRouteName() === $routeNames ? 'active' : '';
    }
}

if (!function_exists('getStatusLabel')) {
    /**
     * Get the status label or text.
     *
     * @param int $status
     * @param bool $textOnly
     * @return string
     */
    function getStatusLabel($status, $textOnly = false)
    {
        $statusText = '';
        $statusClass = '';

        switch ($status) {
            case 1:
                $statusText = 'Active';
                $statusClass = 'label-success';
                break;
            case 0:
                $statusText = 'Inactive';
                $statusClass = 'label-danger';
                break;
            case 2:
                $statusText = 'Pending';
                $statusClass = 'label-warning';
                break;
            default:
                $statusText = 'Unknown';
                $statusClass = 'label-default';
                break;
        }

        // Return only the text if $textOnly is true
        if ($textOnly) {
            return $statusText;
        }

        // Otherwise, return the full HTML label
        return '<span class="label ' . $statusClass . '">' . $statusText . '</span>';
    }
}

if (!function_exists('getBookingStatusLabel')) {
    function getBookingStatusLabel($status)
    {
        $labelClass = 'danger';
        $statusText = 'Unknown';

        switch ($status) {
            case 'confirmed':
                $labelClass = 'primary';
                $statusText = 'Confirmed';
                break;
            case 'pending':
                $labelClass = 'warning';
                $statusText = 'Pending';
                break;
            case 'completed':
                $labelClass = 'success';
                $statusText = 'Completed';
                break;
            case 'canceled':
                $labelClass = 'danger';
                $statusText = 'Canceled';
                break;
        }

        return '<span class="label label-' . $labelClass . '">' . $statusText . '</span>';
    }
}
