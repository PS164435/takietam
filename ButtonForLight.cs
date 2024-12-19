// wcisniecie przycisku zmienia swiatlo i go chowa
using UnityEngine;

public class ButtonForLight : MonoBehaviour
{
    public GameObject lightObject;
    public Light lightEffect;
    public Color lightObjectColor;
    public Color lightEffectColor;
    public GameObject button;
    public Vector3 endPosition;
    public float speed = 2f;
    private bool isMoving = false;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player") || other.CompareTag("Plate"))
        {
            Renderer renderer = lightObject.GetComponent<Renderer>();
            renderer.material.color = lightObjectColor;
            lightEffect.color = lightEffectColor;
            isMoving = true;
        }
    }

    private void Update()
    {
        if (isMoving)
        {
            button.transform.position = Vector3.MoveTowards(button.transform.position, endPosition, speed * Time.deltaTime);
            if (button.transform.position == endPosition)
            {
                isMoving = false;
            }
        }
    }
}