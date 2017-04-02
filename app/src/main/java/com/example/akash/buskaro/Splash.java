package com.example.akash.buskaro;

import android.animation.ObjectAnimator;
import android.content.Intent;
import android.graphics.Point;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.DisplayMetrics;
import android.view.Display;
import android.view.View;
import android.view.animation.AlphaAnimation;
import android.view.animation.Animation;
import android.view.animation.AnimationSet;
import android.view.animation.AnimationUtils;
import android.view.animation.ScaleAnimation;
import android.view.animation.Transformation;
import android.view.animation.TranslateAnimation;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class Splash extends AppCompatActivity {

    ImageView logo;
    LinearLayout siteName;
    TextView siteNameBus;
    TextView siteNameKaro;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.splash);

        logo = (ImageView) findViewById(R.id.logo);
        siteName = (LinearLayout) findViewById(R.id.siteName);
        siteNameBus = (TextView) findViewById(R.id.siteNameBus);
        siteNameKaro = (TextView) findViewById(R.id.siteNameKaro);

        Animation fadeInAnimation = AnimationUtils.loadAnimation(this, R.anim.fade_in);
        fadeInAnimation.setStartOffset(500);
        fadeInAnimation.setDuration(500);
        fadeInAnimation.setFillAfter(true);
        fadeInAnimation.setFillEnabled(true);
        logo.startAnimation(fadeInAnimation );

        Display display = getWindowManager().getDefaultDisplay();
        Point size = new Point();
        display.getSize(size);
        int height = size.y;

        float ydest = height/2 - logo.getHeight();
        ydest = ydest/(1.5f*(float)height);

        TranslateAnimation translateAnimation = new TranslateAnimation(Animation.RELATIVE_TO_SELF, 0, Animation.RELATIVE_TO_SELF, 0,
                Animation.RELATIVE_TO_SELF, 0, Animation.RELATIVE_TO_PARENT, -ydest);
        translateAnimation.setDuration(1000);
        ScaleAnimation scale = new ScaleAnimation(0.8f, 1f, 0.8f, 1f);
        scale.setDuration(300);
        fadeInAnimation.setDuration(1000);
        fadeInAnimation.setStartOffset(0);

        AnimationSet animationSet = new AnimationSet(true);
        animationSet.addAnimation(translateAnimation);
        animationSet.addAnimation(fadeInAnimation);
        animationSet.addAnimation(scale);
        animationSet.setDuration(1000);
        animationSet.setFillEnabled(true);
        animationSet.setFillAfter(true);
        animationSet.setRepeatMode(0);


        animationSet.setAnimationListener(new Animation.AnimationListener() {
            @Override
            public void onAnimationStart(Animation animation) {

            }

            @Override
            public void onAnimationEnd(Animation animation) {
                Animation fadeOut = AnimationUtils.loadAnimation(Splash.this, R.anim.fade_out);
                fadeOut.setStartOffset(500);
                fadeOut.setFillEnabled(true);
                fadeOut.setFillAfter(true);
                fadeOut.setAnimationListener(new Animation.AnimationListener() {
                    @Override
                    public void onAnimationStart(Animation animation) {

                    }

                    @Override
                    public void onAnimationEnd(Animation animation) {
                        changeActivity();
                    }

                    @Override
                    public void onAnimationRepeat(Animation animation) {

                    }
                });

                siteName.startAnimation(fadeOut);
                logo.startAnimation(fadeOut);
            }

            @Override
            public void onAnimationRepeat(Animation animation) {

            }
        });

        siteName.startAnimation(animationSet);

    }

    void changeActivity(){

        Intent intent = new Intent( Splash.this, LoginActivity.class);
        overridePendingTransition(R.anim.fade_in, R.anim.fade_out);

        startActivity(intent);
        finish();

    }
}






