using UnityEngine;
using UnityEngine.UI;

public class EnemyProperties : MonoBehaviour
{
    private float health = 30f;

    public Slider EasHealth;
    public float lerp = 0.05f;

    public Animation anim;

    public void SetHealth(int newHealth)
    {
        health = newHealth;
        // You can add any other property assignments here
    }

    private void Start() {
        EasHealth.maxValue = health;
        anim = GetComponent<Animation>();
    }
    
    private void Update() {
       
        if(EasHealth.value != health && EasHealth != null)
        {
            EasHealth.value = Mathf.Lerp(EasHealth.value, health, lerp);

        }
    }

    public void TakeDamage(int damage) {
        health -= damage;

        // Process damage here (e.g., reduce health)
        // Debug.Log("Enemy takes damage: " + damage);

        if(health <= 0)
        {
            anim.Play("Death");
            Destroy(gameObject, 0.5f);
            
        }
        
    }
}
