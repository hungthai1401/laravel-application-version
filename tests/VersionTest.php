<?php

namespace HT\ApplicationVersion\Tests;

use PHPUnit\Framework\TestCase;
use HT\ApplicationVersion\ApplicationVersion;

/**
 * Test: VersionTest
 * @package HT\ApplicationVersion\Tests
 */
class VersionTest extends TestCase
{
    /**
     * @test
     * @dataProvider providerExistsBundleIdInAppStore
     * @param string $bundle_id
     */
    public function itCanGetApplicationVersionViaAppStore(string $bundle_id)
    {
        $app_store = new ApplicationVersion();
        $version = $app_store->viaAppStore($bundle_id);
        $this->assertNotNull($version);
    }

    /**
     * @test
     * @dataProvider providerNotExistsBundleIdInAppStore
     * @param string $bundle_id
     */
    public function itCannotGetApplicationVersionViaAppStore(string $bundle_id)
    {
        $app_store = new ApplicationVersion();
        $version = $app_store->viaAppStore($bundle_id);
        $this->assertNull($version);
    }

    /**
     * @test
     * @dataProvider providerExistsPackageNameInGooglePlay
     * @param string $package_name
     */
    public function itCanGetApplicationVersionViaGooglePlay(string $package_name)
    {
        $app_store = new ApplicationVersion();
        $version = $app_store->viaGooglePlay($package_name);
        $this->assertNotNull($version);
    }

    /**
     * @test
     * @dataProvider providerExistsPackageNameWithManyApkInGooglePlay
     * @param string $package_name
     */
    public function itCannotGetApplicationVersionViaGooglePlayBecauseItHasManyApkVersion(string $package_name)
    {
        $app_store = new ApplicationVersion();
        $version = $app_store->viaGooglePlay($package_name);
        $this->assertNull($version);
    }

    /**
     * @test
     * @dataProvider providerNotExistsPackageNameInGooglePlay
     * @param string $package_name
     */
    public function itCannotGetApplicationVersionViaGooglePlay(string $package_name)
    {
        $app_store = new ApplicationVersion();
        $version = $app_store->viaGooglePlay($package_name);
        $this->assertNull($version);
    }

    /**
     * @return array
     */
    public function providerExistsBundleIdInAppStore()
    {
        return [
            ['com.google.chrome.ios'],
            ['com.yahoo.frontpage'],
        ];
    }

    /**
     * @return array
     */
    public function providerNotExistsBundleIdInAppStore()
    {
        return [
            ['com.dummy.com'],
            ['com.example.com'],
        ];
    }

    /**
     * @return array
     */
    public function providerExistsPackageNameInGooglePlay()
    {
        return [
            ['com.king.candycrushsaga'],
            ['com.zing.mp3'],
        ];
    }

    /**
     * @return array
     */
    public function providerExistsPackageNameWithManyApkInGooglePlay()
    {
        return [
            ['com.android.chrome'],
            ['com.facebook.katana'],
        ];
    }

    /**
     * @return array
     */
    public function providerNotExistsPackageNameInGooglePlay()
    {
        return [
            ['com.dummy.com'],
            ['com.example.mp3'],
        ];
    }
}
